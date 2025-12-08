<?php

    include "functions.inc";
    include "data.inc";
    
    start_session ();
    
    echo printHead ("Login", "", "");
    
    $out = "<h1 class=\"title\">Hi, please login</h1>";
    $out .= "<form action=\"./navigation/search.php\" method=\"POST\" name=\"loginForm\" id=\"loginForm\" class=\"login\">";
    $out .= "<label for = \"username\"/>";
    $out .= "<input type =\"text\" id=\"username\" class=\"login\" placeholder=\"Here\"/>";
    $out .= "<label for = \"password\"/>";
    $out .= "<input type=\"password\" id=\"password\" class=\"login\"/>";
    $out .= "<button type=\"submit\" name=\"Login\" class=\"login\" id=\"loginButton\">Login</button>";
    $out .= "</form>";
    echo $out;

    echo printTail ();
    