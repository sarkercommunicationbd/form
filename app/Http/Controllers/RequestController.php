<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Registration ;
use App\Models\Permission ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



//    public function requests_view(Request $request)
//    {
//        $sort_search = null;
//
//        // Use whereNull to check for NULL values
//        $categories = Registration::orderBy('id', 'asc')
//            ->whereNull('status');
//
//        if ($request->has('search')) {
//            $sort_search = $request->search;
//            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');
//        }
//
//        $categories = $categories->paginate(10);
//
//        return view('backend.requests.index', compact('categories', 'sort_search'));
//    }

    public function requests_view(Request $request)
    {
        $sort_search = null;
        $page_size = $request->input('page_size', 10); // Default to 10 rows if not specified

        // Query with optional search filter
        $categories = Registration::orderBy('id', 'desc')->whereNull('status');

//        if ($request->has('search')) {
//            $sort_search = $request->search;
//            $categories = $categories->where('full_name', 'like', '%' . $sort_search . '%');
//        }

        if ($request->has('search')) {
            $sort_search = $request->search;
            $categories = $categories->where(function ($query) use ($sort_search) {
                $query->where('full_name', 'like', '%' . $sort_search . '%')
                    ->orWhere('email', 'like', '%' . $sort_search . '%')
                    ->orWhere('nid', 'like', '%' . $sort_search . '%')
                    ->orWhere('phone', 'like', '%' . $sort_search . '%')
                    ->orWhere('iptsp', 'like', '%' . $sort_search . '%');
            });
        }

        // Paginate with dynamic page size
        $categories = $categories->paginate($page_size);


        //counter
        $requestall = Registration::where('status', null)->count();




        return view('backend.requests.index', compact('categories', 'sort_search', 'page_size','requestall'));
    }





    public function approved_view(Request $request)
    {

        $sort_search =null;
        $page_size = $request->input('page_size', 10); // Default to 10 rows if not specified

        $categories = Registration::orderBy('updated_at', 'desc')
                        ->where('status', '1');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $categories = $categories->where(function ($query) use ($sort_search) {
                $query->where('full_name', 'like', '%' . $sort_search . '%')
                    ->orWhere('email', 'like', '%' . $sort_search . '%')
                    ->orWhere('nid', 'like', '%' . $sort_search . '%')
                    ->orWhere('phone', 'like', '%' . $sort_search . '%')
                    ->orWhere('iptsp', 'like', '%' . $sort_search . '%');
            });
        }

        $categories = $categories->paginate($page_size);

        $approved = Registration::where('status', 1)->count();


        return view('backend.requests.approved', compact('categories', 'sort_search', 'page_size','approved'));
    }


    public function decline_view(Request $request)
    {

        $sort_search =null;
        $page_size = $request->input('page_size', 10); // Default to 10 rows if not specified

        $categories = Registration::orderBy('updated_at', 'desc')
            ->where('status', '2');


        if ($request->has('search')) {
            $sort_search = $request->search;
            $categories = $categories->where(function ($query) use ($sort_search) {
                $query->where('full_name', 'like', '%' . $sort_search . '%')
                    ->orWhere('email', 'like', '%' . $sort_search . '%')
                    ->orWhere('nid', 'like', '%' . $sort_search . '%')
                    ->orWhere('phone', 'like', '%' . $sort_search . '%')
                    ->orWhere('iptsp', 'like', '%' . $sort_search . '%');
            });
        }

        $categories = $categories->paginate($page_size);

        $decline = Registration::where('status', 2)->count();


        return view('backend.requests.decline', compact('categories', 'sort_search', 'page_size','decline'));
    }



    public function requests_destroy($id)
    {
        $category = Registration::findOrFail($id);
        $category->delete();



        return redirect()->back()->with('success', 'Deleted successfully');
    }





    public function requests_update(Request $request, $id)
    {
        $category = Registration::findOrFail($id);

        $category->status = 1;


        $category->save();


        return back()->with('success', 'Approved Request successfully');
    }

     public function decline_update(Request $request, $id)
        {
            $category = Registration::findOrFail($id);

            $category->status = 2;


            $category->save();


            return back()->with('success', 'Decline Request successfully');
        }




















    public function permission(Request $request)
    {
        $roleId = 1; // Assuming role_id = 1 for now

        // Fetch permission IDs for the role
        $rolePermissions = Permission::where('role_id', $roleId)->pluck('permission_id')->toArray();

        // Define all possible permissions (7 checkboxes)
        $permissionsList = [
            10 => 'Dashboard Option',
            1 => 'All Request Option',
            2 => 'Approved Option',
            3 => 'Decline Option',
            7 => 'Permission Option',
            11 => 'Sub Admin Option',
            4 => 'View Button',
            5 => 'Edit Button',
            6 => 'Delete Button',
            8 => 'Approve Button',
            9 => 'Decline Button',

        ];

        return view('backend.permission', compact('permissionsList', 'rolePermissions', 'roleId'));
    }

    public function updatePermission(Request $request)
    {
        $roleId = 1; // Fixed role_id for example; adapt it if dynamic

        // Validate the input
        $request->validate([
            'permission' => 'array',
        ]);

        // Get the submitted permissions
        $submittedPermissions = $request->input('permission', []);

        // Remove existing permissions for the role
        Permission::where('role_id', $roleId)->delete();

        // Insert updated permissions
        $permissionsToInsert = [];
        foreach ($submittedPermissions as $permissionId) {
            $permissionsToInsert[] = [
                'role_id' => $roleId,
                'permission_id' => $permissionId,
            ];
        }

        if (!empty($permissionsToInsert)) {
            Permission::insert($permissionsToInsert);
        }

        return redirect()->back()->with('status', 'Permissions updated successfully!');
    }



    public function edit_request(Request $request, $id)
    {
        // Fetch a single record using findOrFail
        $category = Registration::findOrFail($id);

        // Pass the record to the view
        return view('backend.edit', compact('category'));
    }


    public function update_request(Request $request, $id)
    {
        $category = Registration::findOrFail($id);

        $category->full_name = $request->full_name;
        $category->phone = $request->phone;
        $category->email = $request->email;
        $category->address = $request->address;
        $category->billing = $request->billing;
        $category->nid = $request->nid;
        $category->iptsp = $request->iptsp;
        $category->reff = $request->reff;
        $category->type = $request->type;

        // Handle file uploads
        if ($request->photo1 != null) {
            $imageName = uniqid() . '.' . $request->photo1->extension();
            // Move the image to the public/images directory
            $request->photo1->move(public_path('images'), $imageName);
            $category->photo1 = $imageName;
        }

        if ($request->photo2 != null) {
            $imageName = uniqid() . '.' . $request->photo2->extension();
            // Move the image to the public/images directory
            $request->photo2->move(public_path('images'), $imageName);
            $category->photo2 = $imageName;
        }

        if ($request->nid_photo != null) {
            $imageName = uniqid() . '.' . $request->nid_photo->extension();
            // Move the image to the public/images directory
            $request->nid_photo->move(public_path('images'), $imageName);
            $category->nid_photo = $imageName;
        }

        $category->save();

        return redirect()->back()->with('success', 'Registration updated successfully.');
    }



    public function sub(Request $request)
    {


        return view('backend.sub');
    }


    public function sub_create(Request $data)
    {

         User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

         return redirect()->back()->with('success', 'Sub Admin created successfully.');
    }



    //Profile settings

    public function profile_edit(Request $request)
    {
        $id = auth()->user()->id;

        $category = User::findOrFail($id);
        $categories = User::where('id', 2)
            ->get();

        return view('backend.profile.edit', compact('category', 'categories'));
    }


    public function profile_update(Request $request, $id)
    {
        $category = User::findOrFail($id);



        $category->name = $request->name;
        $category->email = $request->email;

        if (!empty($request->password)) {
            $category->password = Hash::make($request->password);
        }




        $category->save();


        return back()->with('success', 'Updated successfully');
    }








}
