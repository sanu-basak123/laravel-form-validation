<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FormSubmitRequest;

class FormSubmitController extends Controller
{
    public function store(FormSubmitRequest $request)
    {
       dd($request->all());
    }
}
