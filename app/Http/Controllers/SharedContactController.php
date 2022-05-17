<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSharedContactRequest;
use App\Http\Requests\UpdateSharedContactRequest;
use App\Models\Contact;
use App\Models\SharedContact;
use App\Models\User;

class SharedContactController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSharedContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSharedContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function show(SharedContact $sharedContact)
    {
        $from = User::find($sharedContact->from);
        $to = User::find($sharedContact->to);
        $contacts = Contact::whereIn("id",json_decode($sharedContact->contact_ids))->get();
        return view('shared-contact.show',compact('from','to','sharedContact','contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function edit(SharedContact $sharedContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSharedContactRequest  $request
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSharedContactRequest $request, SharedContact $sharedContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(SharedContact $sharedContact)
    {
        //
    }
}
