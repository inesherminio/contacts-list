<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::orderBy('name', 'ASC')->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $newContact = new Contact;
            $newContact->name = $request->contact["name"];
            $newContact->email = $request->contact['email'];
            $newContact->contact = $request->contact['contact'];
            $newContact->country = $request->contact['country'];
            $newContact->save();
    
            return $newContact;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingContact = Contact::find($id);

        if ($existingContact) {
            $existingContact->name = $request->contact["name"];
            $existingContact->email = $request->contact['email'];
            $existingContact->contact = $request->contact['contact'];
            $existingContact->country = $request->contact['country'];
            $existingContact->save();

            return $existingContact;
        }

        return "Contact not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingContact = Contact::find($id);

        if ($existingContact) {
            $existingContact->delete();

            return "Contact successfully deleted";
        }

        return "Contact not found";
    }
}
