<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutPage;

class AboutPageController extends Controller
{

      public function about() {

    	$content = AboutPage::pluck('content')->last();
    	return view('about', compact('content'));
    }

        public function store() {

     $data = request()->validate([
    'content' => 'required|min:3',
    ]);

    AboutPage::create($data);
    	return redirect('/aboutedit');
    }
}
