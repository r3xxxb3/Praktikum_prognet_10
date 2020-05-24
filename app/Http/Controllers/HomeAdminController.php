<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
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
        return view('auth.admin.home');
    }

    public function ShowAdminNotification(){
        return view('auth.admin.notifikasi');
    }

    public function MarkAdminNotification($id){
        Auth::guard('admin')->user()->unReadNotifications->where('id', $id)->markAsRead();
        return redirect('/admin/notif');
    }

    public function MarkAdminAll(){
        
        Auth::guard('admin')->user()->unReadNotifications->markAsRead();
        redirect()->back();
    }

}
