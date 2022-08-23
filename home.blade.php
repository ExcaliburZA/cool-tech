<?php   
    
    //function that displays a hyperlinked anchor component that can be used to view specific posts
    function DisplayLink($id, $title){
        echo "<a href=".url('/article/'.$id).">".$title."</a>";
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
<h1>Welcome to the Cool Tech website!</h1>
<p>Today is {{ date('j F Y') }}.</p>

<!-- displaying the articles with a link to each of them -->
<h2>Articles:</h2>
@foreach($articles as $article)
    
    {{DisplayLink($article->id , $article->title)}}
    <p>{{$article->content}}</p>    
    
    @endforeach
    </body>
    </html>
    
 <footer style="border: 4px solid black; padding: 8px 8px 8px 8px; background-color: silver;">
 	{{DisplaySearchLink()}}<br>
 	{{DisplayLegalLink()}}
 	<p style="font-style: italic;">Copyright 2012 - 2022 Cool Tech LLC.</p>
</footer>