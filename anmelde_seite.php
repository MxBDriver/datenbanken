<!doctype html>
<html lang="de">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <title>Passwörter</title>
</head>

<body>
  <?php
  if (isset($_POST["name"])) {
    // Aufruf durch Formular
    if ($_POST["button"] == "submit") {
      $name = $_POST["name"];
      $pwd = $_POST["pwd"];
      $sql = "SELECT id FROM benutzer WHERE name='$name' AND passwort='$pwd'; ";

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bfw";

      try {
        // Befehle die scheitern KÖNNEN
        //Erzeuge PDO Object
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error Mode to exception //Klassenvariablen festlegen
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // war erfolgreich
        // print("Verbindung zur Datenbank war erfolgreich");
        print("<br />");
      } catch (PDOException $e) {
        // wird im Fehlerfall ausgeführt
        print("Verbindung zur Datenbank nicht möglich");
        print("<br />");
        print($e->getMessage());
        exit();
      }
      $result = $conn->query($sql)->fetch();
      var_dump($result);
    }
  } else {
    // Aufruf über URL
  }

  ?>
  <div class="container">
    <div class="text-center">
      <h1>Willkommen im Anmeldebereich!</h1>
    </div>
    <br />
    <br />
    <div class="text-center">
      <form method="POST">
        <label for="fname">Benutzer:</label><br />
        <input type="text" id="fname" name="name"><br /><br />
        <label for="password">Passwort :</label><br />
        <input type="text" id="pwd" name="pwd"><br /><br />
        <button type="submit" class="btn btn-success" value="submit" name="button">Senden</button>
        <button type="submit" class="btn btn-danger" value="cancel" name="button">Cancel</button>
        <button type="submit" class="btn btn-secondary" value="new" name="button">Passwort ändern</button>

      </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>