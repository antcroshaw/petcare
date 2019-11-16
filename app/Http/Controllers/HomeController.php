<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\IndexPage;
use App\PricesPage;
use App\ReviewsPage;
use App\AboutPage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    		
        return view('home');
    }
    
    
     
    public function indexedit()
    {
    	  		$content = IndexPage::pluck('content')->last();
					$allpages = IndexPage::get();   
        return view('internals.indexedit',compact('content','allpages'));
    
    }
    
        public function pricesedit()
    {
    	  		$content = PricesPage::pluck('content')->last();
					$allpages = PricesPage::get();   
        return view('internals.pricesedit',compact('content','allpages'));
    
    }
          public function reviewsedit()
    {
    	  		$content = ReviewsPage::pluck('content')->last();
					$allpages = ReviewsPage::get();   
        return view('internals.reviewsedit',compact('content','allpages'));
    
    }
          public function aboutedit()
    {
    	  		$content = AboutPage::pluck('content')->last();
					$allpages = AboutPage::get();   
        return view('internals.aboutedit',compact('content','allpages'));
    
    }
    
    public function indexdestroy(IndexPage $indexpage)
    {
    	
    	$indexpage->delete();
    
    return redirect('/home');
    }
    
        public function pricesdestroy(PricesPage $pricespage)
    {
    	
    	$pricespage->delete();
    
    return redirect('/home');
    }
        public function reviewsdestroy(ReviewsPage $reviewspage)
    {
    	
    	$reviewspage->delete();
    
    return redirect('/home');
    }
    
        public function aboutdestroy(AboutPage $aboutpage)
    {
    	
    	$aboutpage->delete();
    
    return redirect('/home');
    }
    
    
    
    
    
    
    
    
    
    
}