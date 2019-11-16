<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PricesPage;

class PricesPageController extends Controller
{


      public function prices() {

    	$content = PricesPage::pluck('content')->last();
    	return view('prices', compact('content'));
    }

          public function store() {

     $data = request()->validate([
    'content' => 'required|min:3',
    ]);

    PricesPage::create($data);
    	return redirect('/pricesedit');
    }
}
