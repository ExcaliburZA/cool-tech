<?php

//return view('test'); WORKS!

use Illuminate\Support\Facades\DB;


//various methods for displaying the appropriate HTML components on the page
function DisplayIDButton(){
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/search/id').'">SEARCH</a>';
}

function DisplayCategoryButton(){
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/search/category').'">SEARCH</a>';
}

function DisplayTagButton(){
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/search/tag').'">SEARCH</a>';
}

//displays a link to the search page
function DisplaySearchLink(){
    echo '<a style="border-radius: 5px; padding 10px; text-align: center;" href="'.url('/search').'">SEARCH</a>';
}

//method that renders the opening tag of an HTML form
function DrawFormTop(){
    echo "<form method='post' action=".url('/controller')." >   ";
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
	<title>Article finder</title>
</head>

<body>
<!-- displaying three input forms each of which can be used to search for articles using different criteria -->

    	{{DrawFormTop()}}
    	@csrf
    	<label for="id">Article ID to search for:</label><br>
    	<input name="id" type="text" ><br>
    	<input name="type" type="hidden" value="id" ><br>
    	<button id="btnSearchID" type="submit">Search</button> 

    </form>
    	

    {{DrawFormTop()}}
    @csrf
    	 <label for="category">Category to search for:</label><br>
    	 <input name="category" type="text" ><br>
    	 <input name="type" type="hidden" value="category" ><br>
    	  <button id="btnSearchCategory" type="submit">Search</button> 

    </form>
    	 

    {{DrawFormTop()}}
    @csrf
    	 <label for="tag">Tag to search for:</label><br>
    	 <input name="tag" type="text" ><br>
    	 <input name="type" type="hidden" value="tag" ><br>
    	   <button id="btnSearchTag" type="submit">Search</button> 

    </form>
    
</body>

 <footer style="border: 4px solid black; padding: 8px 8px 8px 8px; background-color: silver;">
 	{{DisplaySearchLink()}}<br>
 	{{DisplayLegalLink()}}
 	<p style="font-style: italic;">Copyright 2012 - 2022 Cool Tech LLC.</p>
</footer>

</html>