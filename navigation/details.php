<?php
    
    include "../include/functions.inc";
    include "../include/data.inc";
    
    session_start ();
    
    echo printHead ("Details", "CSS.css");

    $nsong=$_GET['nSong'];
    $song = $songs[$nsong];

    echo '<!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>' . $song["name"] . '</title>
        <link rel="stylesheet" href="./css/CSS.css">
    </head>
    <body style="background: #957d9e !important;"> <!--con important sovrascrivo bootstrap-->

    <div class="song-wrapper">


    <img src="'.$song["immagine"]  .'"width="300" height="300" " alt="immagine ">


        <!-- BOX INFO A SINISTRA -->
        <div class="details-box">
            <h2 class="song-title">' . $song["name"] . '</h2>

            <p><span>Artista:</span> ' . $song["artist"] . '</p>
            <p><span>Album:</span> ' . $song["album"] . '</p>
            <p><span>Key:</span> ' . $song["key"] . '</p>
            <p><span>BPM:</span> ' . $song["bpm"] . '</p>
            <p><span>Durata:</span> ' . $song["duration"] . '</p>
            <p><span>Data uscita:</span> ' . $song["release date"] . '</p>
        </div>


    </div>

    </body>
    </html>';
    
    echo printTail ();