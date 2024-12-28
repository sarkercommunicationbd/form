<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration as ModelsRegistration;
use Illuminate\Support\Str;

class Registration extends Controller
{


    public function registration_store(Request $request)
    {
        try {
            // Validate the request with unique constraints
            $request->validate([
                'phone' => 'required|numeric|unique:registrations,phone',
                'email' => 'required|email|unique:registrations,email',
                'nid' => 'required|numeric|unique:registrations,nid',
                'iptsp' => 'required|numeric|unique:registrations,iptsp',
                'full_name' => 'required|string|max:255',
                'address' => 'required|string',
                'billing' => 'required|string',
                'photo1' => 'required|file|mimes:jpg,pdf',
                'photo2' => 'required|file|mimes:jpg,pdf',
                'nid_photo' => 'required|file|mimes:jpg,pdf',
                'type' => 'nullable|string|in:Personal,Corporate',
            ]);

            // Create new registration
            $category = new ModelsRegistration;
            $category->full_name = $request->full_name;
            $category->phone = $request->phone;
            $category->email = $request->email;
            $category->address = $request->address;
            $category->billing = $request->billing;
            $category->nid = $request->nid;
            $category->iptsp = $request->iptsp;
            $category->reff = $request->reff;
            $category->type = $request->type;

            // Handle photo uploads
            if ($request->hasFile('photo1')) {
                $imageName = uniqid() . '.' . $request->photo1->extension();
                $request->photo1->move(public_path('images'), $imageName);
                $category->photo1 = $imageName;
            }

            if ($request->hasFile('photo2')) {
                $imageName = uniqid() . '.' . $request->photo2->extension();
                $request->photo2->move(public_path('images'), $imageName);
                $category->photo2 = $imageName;
            }

            if ($request->hasFile('nid_photo')) {
                $imageName = uniqid() . '.' . $request->nid_photo->extension();
                $request->nid_photo->move(public_path('images'), $imageName);
                $category->nid_photo = $imageName;
            }

            $category->save();

            return redirect()->route('registration')->with('success', 'Registered successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return error message for duplicate fields
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Duplicate data found. Please check and try again!');

        }
    }





//    public function registration_store(Request $request)
//    {
//        $category = new ModelsRegistration;
//        $category->full_name = $request->full_name;
//        $category->phone = $request->phone;
//        $category->email = $request->email;
//        $category->address = $request->address;
//        $category->billing = $request->billing;
//        $category->nid = $request->nid;
//        $category->iptsp = $request->iptsp;
//        $category->reff = $request->reff;
//        $category->type = $request->type;
//
//
//
//
//
//        if ($request->photo1 != null) {
//            $imageName = uniqid() . '.' . $request->photo1->extension();
//            // Move the image to the public/images directory
//            $request->photo1->move(public_path('images'), $imageName);
//            $category->photo1 = $imageName;
//        }
//
//        if ($request->photo2 != null) {
//            $imageName = uniqid() . '.' . $request->photo2->extension();
//            // Move the image to the public/images directory
//            $request->photo2->move(public_path('images'), $imageName);
//            $category->photo2 = $imageName;
//        }
//
//        if ($request->nid_photo != null) {
//            $imageName = uniqid() . '.' . $request->nid_photo->extension();
//            // Move the image to the public/images directory
//            $request->nid_photo->move(public_path('images'), $imageName);
//            $category->nid_photo = $imageName;
//        }
//
//
//
//        $category->save();
//
//
//
//        return redirect()->route('registration')->with('success', 'Registered successfully!');
//
//
//
//
//    }


}
