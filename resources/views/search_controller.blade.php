<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

//OLD CONTROLLER FILE. NOT CURRENTLY IN USE. 

    $type = $_POST['type'];
    
    if($type === 'id') {
        
        $value = $_POST['id'];
        
        $article = DB::table('articles')->where('id', '=', $value)->first();
        
        
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
        
        return view('tag', ['tags'=>$tags]);
        
    } else {
        die($type . ' is not a valid search type!');
    }

?>

<html>
<head>
	<title>Controller</title>
</head>

<body>

    
</body>


</html>