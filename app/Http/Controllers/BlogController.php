<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index(){
//        $userApiResponse = Http::get('');
//        $jsonData = $userApiResponse->json();
//
//        dd($jsonData);

        $registerd= true;
        $paid = true;
        if($registerd && $paid){
            return view('blog');
        }else{
            return redirect(route('register'));
        }

    }
}
