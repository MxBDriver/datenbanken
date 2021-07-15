<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bfw";

    try {     
        // Befehle die scheitern KÖNNEN
        //Erzeuge PDO Object
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error Mode to exception //Klassenvariablen festlegen
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
        // war erfolgreich
        // print("Verbindung zur Datenbank war erfolgreich");
        print("<br />");
    }
    catch (PDOException $e) {
        // wird im Fehlerfall ausgeführt
        print("Verbindung zur Datenbank nicht möglich");
        print("<br />");
        print($e->getMessage());
        exit();
    }
    $sql = "SELECT * FROM benutzer;";
    print("<br />");
    $pdoresult = $conn->query($sql);
    $result = $pdoresult->fetchALL();

    // var_dump($result);
    // print("<br />");
    // var_dump($pdoresult);
    // Benutzer für Benutzer
    foreach ($result as $zeile) {
        print("ID:______________");
        print($zeile["id"]);
        print("<br />");
        // Ausgabe ID
        print("Name:___________");
        print($zeile["name"]);
        print("<br />");
        // Ausabe Name
        print("Password:________");
        print($zeile["passwort"]);
        print("<br />");
        // Ausgabe Passwort
    }
    // Ausgabe "Ich habe fertig"
    
?>

