<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{


    public function create()
    {
        return view('contact/index');
    }

    public function store(ContactRequest $request)
    {
        return view('contact/confirm');
    }
}
