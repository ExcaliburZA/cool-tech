<?php
//function that displays a button that returns the user to the home page
function DisplayBackButton(){
    echo "<a href=".url('/').">Back to home page</a>";
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
	<title>Legal information</title>
</head>

<body>
    
    <!-- checking the subsection parameter to determine which legal notice to display to the user -->
    @if($subsection==='terms-of-use')
    	<h1>Terms of use</h1><br>
    	<p>Source code for this website may not be distributed or used for commercial pruposes without the express permission of the owners.</p><br>
    	<p>Although appropriate security measures have been put in place users making use of this website do so at their own risk.</p><br>
    	<p>Attempts to maliciously access parts of the website you have not been given explicit access to is prohibited and offenders will be prosecuted.</p><br>
    @elseif($subsection==='privacy-policy')
    	<h1>Privacy policy</h1><br>
    	<p>Submitted personal information is stored in our database for a period of no more than 5 years after which active users will be asked for their updated information.</p><br>
    	<p>This website complies is POPI compliant.</p><br>
    	<p>Data sent through this website is encrypted with AES for security purposes.</p><br> 	
    @endif
    
    
</body>

 <footer style="border: 4px solid black; padding: 8px 8px 8px 8px; background-color: silver;">
 	{{DisplaySearchLink()}}<br>
 	{{DisplayLegalLink()}}
 	<p style="font-style: italic;">Copyright 2012 - 2022 Cool Tech LLC.</p>
</footer>

</html>