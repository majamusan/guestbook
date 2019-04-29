<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guestbook;
use Auth;

class HomeController extends Controller
{
    protected $guestbook;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(guestbook $guestbook)
    {
        $this->guestbook = $guestbook;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['entries'=> $this->guestbook->where('user_id',Auth::user()->id)->get()] );
    }
    
    public function welcome()
    {
        return view('welcome',['entries'=> $this->guestbook->get()] );
    }
    
   }
