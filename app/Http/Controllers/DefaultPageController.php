<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DefaultPage;
use App\IndexPage;
use App\PricesPage;
use App\AboutPage;
use App\ReviewsPage;
class DefaultPageController extends Controller
{
    public function index() {
    	//sets the index page back to it's default value
    $id = DefaultPage::all()->where('page','index')->max('id'); // gets the id of the latest default page
    $content = DefaultPage::all()->where('id',$id)->pluck('content');// loads in the content ready to update the index page
    IndexPage::create(['content' => $content[0]]);//makes a new entry in the index page database loaded with the default content
    return back();
    
    }
    
        public function prices() {
    	//sets the prices page back to it's default value
    $id = DefaultPage::all()->where('page','prices')->max('id'); // gets the id of the latest default page
    $content = DefaultPage::all()->where('id',$id)->pluck('content');// loads in the content ready to update the index page
    PricesPage::create(['content' => $content[0]]);//makes a new entry in the index page database loaded with the default content
    return back();
    
    }
            public function reviews() {
    	//sets the reviews page back to it's default value
    $id = DefaultPage::all()->where('page','reviews')->max('id'); // gets the id of the latest default page
    $content = DefaultPage::all()->where('id',$id)->pluck('content');// loads in the content ready to update the index page
    ReviewsPage::create(['content' => $content[0]]);//makes a new entry in the index page database loaded with the default content
    return back();
    
    }
            public function about() {
    	//sets the about page back to it's default value
    $id = DefaultPage::all()->where('page','about')->max('id'); // gets the id of the latest default page
    $content = DefaultPage::all()->where('id',$id)->pluck('content');// loads in the content ready to update the index page
    AboutPage::create(['content' => $content[0]]);//makes a new entry in the index page database loaded with the default content
    return back();
    
    }
    
    
    //this function will only be used on initial setup to load the correct default pages. It works for all the default pages, not just index
    public function store($page) {
    	$page_name = $page;
    	$new_default = new DefaultPage();
    	$content=request('content'); //gets the content from the textarea
    	$new_default->content = $content;
    	$new_default->page = $page_name;
    	$new_default->save();
    return back();
    
    
    }
}
