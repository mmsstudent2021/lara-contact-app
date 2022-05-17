<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Models\SharedContact;
use App\Models\User;
use App\Notifications\ContactNotfication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where("user_id",Auth::id())->paginate(7);
//        return $contacts;
        return view("contact.index",compact('contacts'));
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
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function bulkShare(Request $request){

        return redirect()->route('contact.index');
    }

    public function bulkAction(Request $request){


//        return $request;
        if($request->functionality == 1){

            $toUser = User::where("email",$request->email)->first();
            $sc = new SharedContact();
            $sc->from=Auth::id();
            $sc->to = $toUser->id;
            $sc->contact_ids = json_encode($request->contact_ids);
            return $sc;
            $sc->save();
            $toUser->notify(new ContactNotfication($request->message,$sc->id));


        }elseif($request->functionality == 2){
            Contact::destroy(join(',',$request->contact_ids));
        }else{
            return  abort(403);
        }
        return redirect()->back();
    }
}
