<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registration;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data ['request'] = Registration::where('status', null)->count();
        $data ['approved'] = Registration::where('status', 1)->count();
        $data ['decline'] = Registration::where('status', 2)->count();
        $data ['users'] = User::count();

        return view('backend.dashboard',$data);



    }

    public function test_dashboard()
    {

        $data ['request'] = Registration::where('status', null)->count();
        $data ['approved'] = Registration::where('status', 1)->count();
        $data ['decline'] = Registration::where('status', 2)->count();
        $data ['users'] = User::count();

        return view('backend.test_dashboard',$data);



    }
}
