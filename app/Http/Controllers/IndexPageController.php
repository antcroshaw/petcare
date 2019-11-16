<?php

namespace App\Http\Controllers;


use App\IndexPage;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;

class IndexPageController extends Controller
{

        public function index() {

    	$content = IndexPage::pluck('content')->last();
    	return view('index', compact('content'));
    }

        public function store() {

     $data = request()->validate([
    'content' => 'required|min:3',
    ]);

    IndexPage::create($data);
    	return redirect('/indexedit');
    }

   }
