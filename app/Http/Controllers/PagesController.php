<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "LMAO test";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('titles', $title);
    }

    public function about(){
        return view('pages.about');
    }

    public function services(){
        $data = array(
          'title' => 'services Title',
          'test' => 'test',
          'arrayTest' => ['item1', 'item2', 'item3']
        );
        return view('pages.services')->with($data);
    }
}
