<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        $authors = [
            1 => 'John Doe',
            2 => 'Alpha',
            3 => 'Clementine'
        ];

        return view(
            'accueil',
            [
                'name' => 'Jonh Doe',
                'age' => 15,
                'nombre' => 3,
                'authors' => $authors
            ]
        );
    }

    public function about(){
        return view('about');
    }
}
