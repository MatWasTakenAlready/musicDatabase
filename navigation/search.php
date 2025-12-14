<?php

    include "../include/functions.inc";
    include "../include/data.inc";
    
    session_start ();
    
    echo printHead ("Search", "CSS.css");
 
    /*if ((empty ($_POST ["username"]) || (empty ($_POST ["password"])))) {
        header ("../index.php?messaggio=<p class = \"error\">Please provide all required information</p>");
    } else {
        echo printhead ("Search", "", ""); //TODO
    }*/ // not needed anymore
    
    if (array_key_exists ($_POST ["username"], $users) && isPasswordCorrect ($_POST ["password"], $users [$_POST ["username"]] ["password"])) { // search among array keys. If no user is found, 
    //                                                                                                                                             or if password is incorrect, you get logged in as Guest
        
        $_SESSION ["username"] = $_POST ["username"]; // users key, the username of the user
        $_SESSION ["name"] = $users [$_POST ["username"]] ["name"];
        $_SESSION ["surname"] = $users [$_POST ["username"]] ["surname"];
        $_SESSION ["age"] = $users [$_POST ["username"]] ["age"];
        $_SESSION ["password"] = $users [$_POST ["username"]] ["password"];
        $users [$_POST ["username"]] ["password"]++;
        $_SESSION ["accesses"] = $users [$_POST ["username"]] ["accesses"];
        
    } else {
        
        $_SESSION ["username"] = "Guest";
        $_SESSION ["name"] = $users ["Guest"] ["name"];
        $_SESSION ["surname"] = $users ["Guest"] ["surname"];
        $_SESSION ["age"] = $users ["Guest"] ["age"];
        $_SESSION ["password"] = $users ["Guest"] ["password"];
        $_SESSION ["accesses"] = 1;
        
    } // login process
    
    $out = "<p>$_SESSION[username] <a href=\"../index.php\">logout</a></p>";
    $out .= "<h1>Music Crawler 1.0</h1>"; //not working
    
    $out .= "<form action=\"./results.php\" method=\"GET\" name=\"search\" id=\"search\">";
    $out .= "<p>Select category</p>";
    $out .= "<p><label for=\"song\">Song name</label>";
    $out .= "<input type=\"radio\" id=\"song\" name=\"category\" value\"songName\"/></p>";
    $out .= "<p><label for=\"artist\">Artist name</label>";
    $out .= "<input type=\"radio\" id=\"artist\" name=\"category\" value\"artist\"/></p>";
    $out .= "<p><label for=\"key\">Key</label>";
    $out .= "<input type=\"radio\" id=\"key\" name=\"category\" value\"key\"/></p>";
    $out .= "<p><label for=\"bpm\">Bpm</label>";
    $out .= "<input type=\"radio\" id=\"bpm\" name=\"category\" value\"bpm\"/></p>";
    $out .= "<input type=\"text\" id=\"search\" name=\"search\" placeholder=\"write here\"/>";
    $out .= "<button type=\"submit\" id=\"send\" name=\"send\">Search</button>";
    $out .= "</form>";
    
    
    
    
    
    
    
    
    
    
    echo $out;   
    
    echo printTail ();
