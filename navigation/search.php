<?php

    include "functions.inc";
    include "data.inc";
    
    start_session ();
    
    echo printhead ("Search", "", "");
    
    if (array_key_exists ($_POST ["username"], $users) && isPasswordCorrect ($_POST ["password"], $users ["password"])) { // search among array keys. If no user is found, 
    //                                                                                                                       or if password is incorrect, you get logged in as Guest
        
        $_SESSION ["username"] = $_POST ["username"]; // users key, the username of the user
        $_SESSION ["name"] = $users [$_POST ["username"]] ["name"];
        $_SESSION ["surname"] = $users [$_POST ["username"]] ["surname"];
        $_SESSION ["age"] = $users [$_POST ["username"]] ["age"];
        $_SESSION ["password"] = $users [$_POST ["username"]] ["password"];
        $_SESSION ["accesses"] = ($users [$_POST ["username"]] ["accesses"])++;
        
    } else {
        
        $_SESSION ["username"] = "Guest";
        $_SESSION ["name"] = $users [$_POST ["Guest"]] ["name"];
        $_SESSION ["surname"] = $users [$_POST ["Guest"]] ["surname"];
        $_SESSION ["age"] = $users [$_POST ["Guest"]] ["age"];
        $_SESSION ["password"] = $users [$_POST ["Guest"]] ["password"];
        $_SESSION ["accesses"] = 1;
        
    } // login process
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    echo printTail ();
