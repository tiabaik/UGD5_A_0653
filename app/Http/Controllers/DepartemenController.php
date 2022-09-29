<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;


class DepartemenController extends Controller
{
    //
        public function index()
    {
        //get posts
        $departemen = Departemen::get();
        //render view with posts
        return view('departemen.index', compact('departemen'));
    }

}
