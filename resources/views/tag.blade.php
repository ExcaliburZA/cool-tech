<?php

use Illuminate\Support\Facades\DB;

//function that displays a hyperlink to the relevant article
function DisplayLink($id, $title){
    echo "<a href=".url('/article/'.$id).">".$title."</a>";
}

//function that displays a button that returns the user to the home page
function DisplayBackButton(){
    echo "<a href=".url('/').">Back to home page</a>";
}

//function that retrieves an article from the database and displays it on the page
function DisplayArticle($id){
    $article = DB::table('articles')->where('id', '=', $id)->first();
    
    echo "<h1>".($article->title)."</h1><br>";
    echo "<p>".($article->content)."</p><br>";
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
<title>Cool Tech</title>
</head>
<body>

<h2>Articles:</h2>
<!-- iterating through the list of article tags and displaying each article that contains the appropriate tags-->
	@foreach($tags as $tag)
    
    {{DisplayArticle($tag->articleID)}}
    
    @endforeach
    
    {{DisplayBackButton()}}
    </body>
    
 <footer style="border: 4px solid black; padding: 8px 8px 8px 8px; background-color: silver;">
    {{DisplaySearchLink()}}<br>
    {{DisplayLegalLink()}}
    <p style="font-style: italic;">Copyright 2012 - 2022 Cool Tech LLC.</p>
</footer>
    
    </html>