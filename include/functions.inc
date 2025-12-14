<?php

    function printHead ($title, $css, $iconName="", $author="Matteo&Simone") { //iconname contains the file extention too
        
        $out = "<!DOCTYPE html>"
                . "<html>"
                    . "<head>"
                        . "<title>$title</title>"
                        . "<link rel=\"icon\" href=\"./images/$iconName\"/>"
                        . "<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/$css\"/>"
                        . "<html lang=\"en\"/>"
                        . "<meta charset=\"utf-8\"/>"
                        . "<meta name=\"author\" content=\"$author\"/>"
                        . "<meta name=\"viewpoint\" content=\"width=device-width, initial-scale=1.0\"/>"
                    . "</head>"
                    . "<body>";
        return $out;
        
    }
    
    function printTail () {
        
        $out = "</body></html>";
        return $out;
        
    }
    
    function isPasswordCorrect ($givenPassword, $correctPassword) {
        
        if ($givenPassword == $correctPassword) {
            return 1;
        }
        return 0;
        
    }
    