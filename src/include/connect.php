<?php

    const DBHOST = "db";
    const DBNAME = "projet_catalogue";
    const DBUSER = "catalogue";
    const DBPASS = "catalogue";

    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    try {
        // essaie de connection 
        $db = new PDO($dsn, DBUSER, DBPASS);
        // echo "connexion réussi" . "<br>";
    } catch(PDOException $error) {
        //recupération message erreur
        echo "Echec de la connexion: " . $error->getMessage() . "<br>";
    }
?>