<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function tinymce()
    {
        return view('frontend.tinymce');
    }


    public function tinymce_post(Request $request)
    {
        return  $request;
    }

    public function ckeditor()
    {
        return view('frontend.ckeditor');
    }


    public function ckeditor_post(Request $request)
    {
        return  $request;
    }


    public function summernote()
    {
        return view('frontend.summernote');
    }


    public function summernote_post(Request $request)
    {
        return  $request;
    }


}
