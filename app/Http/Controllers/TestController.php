<?php

namespace App\Http\Controllers;

use App\Models\Communes;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        $communes = Communes::all();
       return view('index',['communes'=> $communes]);
    }
}
