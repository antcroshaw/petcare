<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewsPage;

class ReviewsPageController extends Controller
{

      public function reviews() {

    	$content = ReviewsPage::pluck('content')->last();
    	return view('reviews', compact('content'));
    }

        public function store() {

     $data = request()->validate([
    'content' => 'required|min:3',
    ]);

    ReviewsPage::create($data);
    	return redirect('/reviewsedit');
    }
}
