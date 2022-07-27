<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:10',
            'email'    => 'required|email',
            'tel'      => 'nullable|numeric',
            'gender'   => 'required',
            'image'    => 'nullable|image',
            'contents' => 'required',
        ]);

        if($request->file('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;

            $request->file('image')->move(public_path() . "/img/tmp", $newImageName);
            $image = "/img/tmp/" . $newImageName;
            $inputs = $request->all();
            return view('contacts.confirm', compact('inputs', 'image', 'newImageName'));
        }else{
            $inputs = $request->all();
            return view('contacts.confirm', compact('inputs'));
        }
    }

    public function process(Contact $contact, Request $request)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');
        if($action === 'submit') {

            $contact->fill($input);
            $contact->save();
            return redirect()->route('complete');
        }else {
            return redirect()->route('contact')->withInput($input);
        }
    }

    public function complete()
    {
        return view('contacts.complete');
    }
}
