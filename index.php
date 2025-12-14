<?php

    include "./include/functions.inc";
    include "./include/data.inc";
    
    session_unset (); //if you end up in this page, a logout occurs
    session_destroy ();
    
    session_start ();
           
    echo printHead("Login", "CSS.css");
    
    
    $out = "<div class='login-container'>";
    $out .= "<div class='login-box'>";
    $out .= "<h1 class=\"title\">Hi, please login</h1>";
    $out .= "<form action=\"./navigation/search.php\" method=\"POST\" name=\"loginForm\" id=\"loginForm\">";
    $out .= "<label for=\"username\"></label>";
    $out .= "<input type=\"text\" id=\"username\" class=\"form-control mb-2\" placeholder=\"Username\" />";
    $out .= "<label for=\"password\"></label>";
    $out .= "<input type=\"password\" id=\"password\" class=\"form-control mb-3\" placeholder=\"Password\" />";
    $out .= "<button type=\"submit\" name=\"Login\" id=\"loginButton\" class=\"btn btn-primary w-100\">Login</button>";
    $out .= "</form>";
    $out .= "</div>"; // login-box
    $out .= "</div>"; // login-container

    echo $out;

    echo printTail();
