<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Id;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('contactForm');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([

            'name' => 'required',

            'email'     => 'required|unique:contacts,email,',
            'phone' => 'required|digits:10|numeric|unique:contacts,phone',
            'subject' => 'required',
            'id-unique' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());
        Id::create($request->all());


        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
}
