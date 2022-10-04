<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
       //get posts
    $golongan = Golongan::get();
    $golongan = Golongan::latest()->paginate(5);


    //render view with posts
    return view('golongan.index', compact('golongan'));

    }
    
}
