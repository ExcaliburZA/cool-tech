<?php

use Illuminate\Support\Facades\DB;

//function that displays a button that returns the user to the home page
function DisplayBackButton(){
    echo "<a href=".url('/').">Back to home page</a>";
}

//function that retrieves and displays the relevant tags for a specific article
function GetTagName($tag_id){
    $tag_name = DB::table('tags')->where('tagID', '=', $tag_id)->first();
    
    //checking the tagID to see the tag that it matches before displaying the tag's name
    if($tag_id === 6){
        echo "<a href=".url('/tag/ai').">".($tag_name->name)."</p><br>";
    }
    else if($tag_id === 7){
        echo "<a href=".url('/tag/google').">".($tag_name->name)."</p><br>";
    }
    else if($tag_id === 8){
        echo "<a href=".url('/tag/high-performance-computing').">".($tag_name->name)."</p><br>";
    }
    else if($tag_id === 9){
        echo "<a href=".url('/tag/singularity').">".($tag_name->name)."</p><br>";
    }
    else if($tag_id === 10){
        echo "<a href=".url('/tag/cloud-computing').">".($tag_name->name)."</p><br>";
    }  
    else if($tag_id === 11){
        echo "<a href=".url('/tag/review').">".($tag_name->name)."</p><br>";
    }
    else if($tag_id === 12){
        echo "<a href=".url('/tag/guide').">".($tag_name->name)."</p><br>";
    }  
    else if($tag_id === 13){
        echo "<a href=".url('/tag/opinion').">".($tag_name->name)."</p><br>";
    }  
}

//function that checks each article tag for the specific article and displays their names
function DisplayTags($id){    
    $tags = DB::table('article_tags')->where('articleID', '=', $id)->get();
    
    foreach($tags as $tag){
        GetTagName($tag->tagID);
    }    
}

//displays a link to the search page
function DisplaySearchLink(){
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/search').'">SEARCH</a>';
    
}

//displays links to the two legal information pages
function DisplayLegalLink() {
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/legal/privacy-policy').'">Privacy Policy</a><br>';
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/legal/terms-of-use').'">Terms of Use</a>';
}

?>
<x-cookie-notice />
<html>
    <head>
    <title>Article info</title>
    </head>

<body>
<!-- area where article information is displayed -->
<h1>Article viewer</h1>

    <h2>{{$article->title}}</h2><br>
    <p>{{$article->content}}</p><br>
    <p>{{$article->created}}</p>

	<h3>TAGS</h3>
	{{DisplayTags($article->id)}}

    {{DisplayBackButton()}}

</body>

 <footer style="border: 4px solid black; padding: 8px 8px 8px 8px; background-color: silver;">
 	{{DisplaySearchLink()}}<br>
 	{{DisplayLegalLink()}}
 	<p style="font-style: italic;">Copyright 2012 - 2022 Cool Tech LLC.</p>
</footer>

    </html>
    
