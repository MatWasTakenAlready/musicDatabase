<?php

    include "../include/functions.inc";
    include "../include/data.inc";
    
    session_start ();
    
    echo printHead ("Results", "CSS.css");

    $out = "";
    $trovato = false;

    if (isset($_POST['ricerca']) && $_POST['ricerca'] != null) {

        $ricerca = $_POST['ricerca'];

        //Stampo la prima riga della tabella
        $out .= "<table>";
        $out .= "
            <tr>
                <th>Titolo</th>
                <th>Artista</th>
                <th>Key</th>
                <th>BPM</th>
                <th>Durata</th>
                <th>Data uscita</th>
                <th>Album</th>
                <th>Carica File</th>
                <th>Pagina canzone</th>
            </tr>
        ";

        // Ricerca nei titoli
        foreach ($songs as $i => $song) {  // uso $i per creare input unici

            if (stripos($song['name'], $ricerca) !== false) {
                // stripos non distingue maiuscole/minuscole e trova anche una parte della parola,
                // se il titolo fosse Scuol4, verrebbe trovato anche con: scuol4, scuol o SCUOL

                $out .= "
                    <tr>
                        <td>{$song['name']}</td>
                        <td>{$song['artist']}</td>
                        <td>{$song['key']}</td>
                        <td>{$song['bpm']}</td>
                        <td>{$song['duration']}</td>
                        <td>{$song['release date']}</td>
                        <td>{$song['album']}</td>
                        <td>
                            <input type='file' name='file_$i'>
                        </td>
                        <td>
                            <a href='http://localhost/ProgettoMuscialeConVeronesi/paginaCanzone.php?nsong=" . ($i + 1) . "'>
                                <button type='button'>Apri</button>
                            </a>
                        </td>
                    </tr>
                ";

                $trovato = true;
            }
        }

        // Se non ho trovato nulla allora controllo il radiobutton
        if ($trovato == false) {

            if (isset($_POST['categoria']) && $_POST['categoria'] != null) {

                foreach ($songs as $i => $song) {

                    if (
                        isset($song[$_POST['categoria']]) &&
                        stripos((string)$song[$_POST['categoria']], $ricerca) !== false
                    ) {

                        $out .= "
                            <tr>
                                <td>{$song['name']}</td>
                                <td>{$song['artist']}</td>
                                <td>{$song['key']}</td>
                                <td>{$song['bpm']}</td>
                                <td>{$song['duration']}</td>
                                <td>{$song['release date']}</td>
                                <td>{$song['album']}</td>
                                <td>
                                    <input type='file' name='file_$i'>
                                </td>
                                <td>
                                    <a href='http://localhost/ProgettoMuscialeConVeronesi/paginaCanzone.php?nsong=" . ($i + 1) . "'>
                                        <button type='button'>Apri</button>
                                    </a>
                                </td>
                            </tr>
                        ";

                        $trovato = true;
                    }
                }
            }
        }

        $out .= "</table>";

        // Se non trovo nulla stampo "Nessuna canzone trovata"
        if ($trovato == false && (!isset($_POST['categoria']) || $_POST['categoria'] == null)) {
            $out = "Nessuna canzone trovata.";
        }

        echo $out;
        
        echo printTail ();
        
    }
