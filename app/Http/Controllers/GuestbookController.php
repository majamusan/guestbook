<?php

namespace App\Http\Controllers;

use App\guestbook;
use App\responses;
use Illuminate\Http\Request;
use Auth;

class GuestbookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
                            'entry' => 'required',
                            'date' => 'required|date',
                            'feeling' => '',
                            ] );
        $res = new guestbook;
        $res->fill([
          'entry' => nl2br($request->entry),
          'date' => $request->date,
          'feeling' => $request->feeling,
          'user_id' => Auth::user()->id
        ] );
        $res->save();
        return redirect('home' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function show(guestbook $guestbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function edit(guestbook $guestbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guestbook $guestbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(guestbook $guestbook, $id)
    {
        $res = $guestbook->find($id);
        
        if($res->user_id != Auth::user()->id) return redirect('/' )->with('message', __('other.error') ) ;
        
        $res->delete();
        return redirect('home' );
    }
    
    /**
     *save a responce but only from admin user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     **/
    public function responce(Request $request)
    {
        
        if(Auth::user()->id != config('app.admin_user_id') ) return redirect('/' )->with('message', __('other.error') ) ;
        $request->validate([
                            'id' => 'required',
                            'responce' => 'required',
                            ] );
        $res = new responses;
        $res->fill([
          'responce' => nl2br($request->responce),
          'guestbook_id' => $request->id,
          'user_id' => Auth::user()->id
        ] );
        $res->save();
        return redirect('/');
        
    }
}
