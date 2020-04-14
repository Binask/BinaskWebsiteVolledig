<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <style>
        .topnav {
      overflow: hidden;
      background: rgb(255, 255, 255);
    }

    .topnav a {
      float: left;
      display: block;
      color: black;
      text-align: center;
      padding: 23px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }




    .topnav input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }
    .topnav input[type=text] {
      border: 1px solid #ccc;
    }
.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.input {
  float: left;
  margin-right: 100%;
}

.labels {
  float: left;
  margin-left: 16px;
}

.tekst {
  margin-left: 16px;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid rgb(26, 24, 24);
  }
}

    </style>
</head>
<body>
    <div class='topnav'>
      <a href=#>Startpagina</a>
      <a href=Login.php>Inloggen</a>
      <a href=Registratie.php>Registreren</a>
      <a href=account.php>Account</a>
        <div class="search-container">
            <form action="/action_page.php">
              <input type="text" placeholder="Zoeken.." name="search">
              <button type="submit">Zoek<i class="fa fa-search"></i></button>
            </form>
          </div>
    </div>
    <div class='head'>
    <h1 class='tekst'>Registratie</h1>
    <br>
        <form action="Registratie.php" method="POST">
      <p class='tekst'>Vul hier uw gegevens in om een account aan te maken.</p>
      <hr>
      <label class='labels' for="email"><b>Email:</b></label>
      <input class='input' type="text" placeholder="Email" name="email" required>
      <br>
      <br>
      <br>
      <label class='labels' for="psw"><b>Wachtwoord:</b></label>
      <input class='input' type="password" placeholder="Wachtwoord" name="psw" required>
      <br>
      <br>
      <br>
      <label class='labels' for="psw-repeat"><b>Herhaal wachtwoord:</b></label>
      <input class='input' type="password" placeholder="Herhaal Wachtwoord" name="psw-repeat" required>
      <br>
      <br>
      <br>
      <br>
      <button class='labels' type="submit" class="signupbtn" name="register">Registreren</button>
        </form>
    </div>
</body>
<?php
if(array_key_exists('register', $_POST)) {
    register();
}

function register()
{
  $user = "student";
  $password = "student";
  $host = "localhost";
  $dbase = "BinaskDB";
  
  
  // Verbinden met database
  $dbc = mysqli_connect($host, $user, $password, $dbase)
  or die("Unable to select database");
  
  if (function_exists('test_input') == false){
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
  }

    if (isset($_POST['email'])) {
        $email = test_input($_POST['email']);
    }
    if (isset($_POST['psw'])) {
        $password1 = test_input($_POST['psw']);
    }
    if (isset($_POST['psw-repeat'])) {
        $passwordconfirm = test_input($_POST['psw-repeat']);
    }


    if ($password1 != $passwordconfirm) {
        echo "Wachtwoorden zijn niet hetzelfde";
    }
    elseif (strpos($email, '@student.nhlstenden.com') == false && strpos($email, '@nhlstenden.com') == false )
    {
        echo "Registreer alstublieft met een NHL-Stenden emailadres";
    }
    else {
        $registerquery = $dbc->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $registerquery->bind_param("ss", $email, $password1);
        if ($registerquery->execute() == true) {
            $registerquery->execute();
            echo "Registeren gelukt!";
        } else {
            echo "Account bestaat al";
        }
    }
    $dbc->close();
}

?>

</html>