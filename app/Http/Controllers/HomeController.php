<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        return view('index');
    }

    public function account()
    {
        return view('account');
    }

    public function subscriptions()
    {
        return view('subscriptions');
    }

    public function settings()
    {
        return view('settings');
    }

    public function upload()
    {
        return view('upload');
    }

    public function uploadVideo()
    {
        return view('uploadVideo');
    }

    public function categories()
    {
        return view('categories');
    }

    public function channels()
    {
        return view('channels');
    }

    public function singleChannel()
    {
        return view('singleChannel');
    }

    public function videoPage()
    {
        return view('videoPage');
    }

    public function historyPage()
    {
        return view('historyPage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }


}
