<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register web routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | contains the "web" middleware group. Now create something great!
 |
 */   
Route::post('/controller', function(){
    
    
    $type = $_POST['type'];
    
    //checking the type of value being searched for and retrieving the relevant records from the database tables
    if($type === 'id') {
        
        
        $value = $_POST['id'];
        
        $article = DB::table('articles')->where('id', '=', $value)->first();
        
        //returning the appropriate view with data
        return view('article', ['article'=>$article]);
    
    } else if ($type === 'category') {
        
        $articles;
        
        $value = $_POST['category'];
        
        if($value === 'tech news'){
            $articles = DB::table('articles')->where('categoryID', '=', 1)->get();
        }
        else if($value === 'software reviews'){
            $articles = DB::table('articles')->where('categoryID', '=', 2)->get();
        }
        else if($value === 'hardware reviews'){
            $articles = DB::table('articles')->where('categoryID', '=', 3)->get();
        }
        else if($value === 'opinion pieces'){
            $articles = DB::table('articles')->where('categoryID', '=', 4)->get();
        }
        else if($value === 'guides'){
            $articles = DB::table('articles')->where('categoryID', '=', 5)->get();
        }
        else{
            die($value . " is not a valid category!");
        }
        
        //returning the appropriate view with data
        return view('category', ['articles'=>$articles]);
        
    } else if ($type === 'tag') {
        
        $tags;
        
        $value = $_POST['tag'];
        
        if($value === 'ai'){
            $tags = DB::table('article_tags')->where('tagID', '=', 6)->get();
        }
        else if($value === 'google'){
            $tags = DB::table('article_tags')->where('tagID', '=', 7)->get();
        }
        else if($value === 'high performance computing'){
            $tags = DB::table('article_tags')->where('tagID', '=', 8)->get();
        }
        else if($value === 'singularity'){
            $tags = DB::table('article_tags')->where('tagID', '=', 9)->get();
        }
        else if($value === 'cloud computing'){
            $tags = DB::table('article_tags')->where('tagID', '=', 10)->get();
        }
        else if($value === 'review'){
            $tags = DB::table('article_tags')->where('tagID', '=', 11)->get();
        }
        else if($value === 'guide'){
            $tags = DB::table('article_tags')->where('tagID', '=', 12)->get();
        }
        else if($value === 'opinion'){
            $tags = DB::table('article_tags')->where('tagID', '=', 13)->get();
        }
        else{
            die($value . " is not a valid tag!");
        }
        
        //returning the appropriate view with data
        return view('tag', ['tags'=>$tags]);
        
    } else {
        die($type . ' is not a valid search type!');
    }
    
});


//routing function that redirects the user to the search page
Route::get('/search', function(){
    return view('/search');
});
        
//routing function that directs the user to the appropriate legal page            
Route::get('/legal/{subsection}', function($subsection) {
    return view('legal', ['subsection'=>$subsection]);
})->where('subsection', '(terms-of-use|privacy-policy)');
            
//routing function that directs the user to the home page where articles are displayed
Route::get('/', function() {
    $articles = DB::table('articles')->get();
    
    return view('home', ['articles'=>$articles]);
});                               

//routing function that retrieves and displays a specific article
Route::get('/article/{id}', function($id) {

    $article = DB::table('articles')->where('id', '=', $id)->first();

    return view('article', ['article'=>$article]);
    
});

//routing funtion that redirects the user to a page where they can view all articles of a specifc category
Route::get('/category/{slug}', function($slug) {
    
    $articles;
    
    //checking the slug to determine which categoryID it corresponds with before selecting the appropriate records from the database    
    if($slug === 'tech-news'){
        $articles = DB::table('articles')->where('categoryID', '=', 1)->get();        
    }
    else if($slug === 'software-reviews'){
        $articles = DB::table('articles')->where('categoryID', '=', 2)->get();   
    }
    else if($slug === 'hardware-reviews'){
        $articles = DB::table('articles')->where('categoryID', '=', 3)->get();   
    }
    else if($slug === 'opinion-pieces'){
        $articles = DB::table('articles')->where('categoryID', '=', 4)->get();   
    }
    else if($slug === 'guides'){
        $articles = DB::table('articles')->where('categoryID', '=', 5)->get();   
    }
    else{
        die($slug . " is not a valid category!");
    }
    
    //returning the view with a parameter
    return view('category', ['articles'=>$articles]);
        
});

//routing funtion that redirects the user to a page where they can view all articles containing a specific tag
Route::get('/tag/{slug}', function($slug) {
    
    $tags;
    
    //checking the slug to determine which tagID it corresponds with before selecting the appropriate records from the database
    if($slug === 'ai'){
        $tags = DB::table('article_tags')->where('tagID', '=', 6)->get();
    }
    else if($slug === 'google'){
        $tags = DB::table('article_tags')->where('tagID', '=', 7)->get();
    }
    else if($slug === 'high-performance-computing'){
        $tags = DB::table('article_tags')->where('tagID', '=', 8)->get();
    }
    else if($slug === 'singularity'){
        $tags = DB::table('article_tags')->where('tagID', '=', 9)->get();
    }
    else if($slug === 'cloud-computing'){
        $tags = DB::table('article_tags')->where('tagID', '=', 10)->get();
    }
    else if($slug === 'review'){
        $tags = DB::table('article_tags')->where('tagID', '=', 11)->get();
    }
    else if($slug === 'guide'){
        $tags = DB::table('article_tags')->where('tagID', '=', 12)->get();
    }
    else if($slug === 'opinion'){
        $tags = DB::table('article_tags')->where('tagID', '=', 13)->get();
    }
    else{
        die($slug . " is not a valid tag!");
    }
    
    //returning the view with a parameter
    return view('tag', ['tags'=>$tags]);
    
});








