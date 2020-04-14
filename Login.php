<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
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
        <div class="search-container">
            <form action="/action_page.php">
              <input type="text" placeholder="Zoeken.." name="search">
              <button type="submit">Zoek<i class="fa fa-search"></i></button>
            </form>
          </div>
    </div>
    <div class='head'>
    <h1 class='tekst'>Inloggen</h1>
      <hr>
      <label class='labels' for="email"><b>Email:</b></label>
      <br>
      <input class='input' type="text" placeholder="Email" name="email" required>
      <br>
      <br>
      <br>
      <label class='labels' for="psw"><b>Wachtwoord:</b></label>
      <br>
      <input class='input' type="password" placeholder="Wachtwoord" name="psw" required>
      <br>
      <br>
      <br>
      <br>
      <button class='labels' name="login" type="submit" class="signupbtn">Inloggen</button>
        </div>
</body>
<?
if(array_key_exists('login', $_POST)) {
    login();
}

function login()
{
    $user = "student";
    $password = "student";
    $host = "localhost";
    $dbase = "BinaskDB";


    // Verbinden met database
    $dbc = mysqli_connect($host, $user, $password, $dbase)
    or die("Unable to select database");



    if (isset($_POST['email'])) {
        $email = test_input($_POST['email']);
    }
    if (isset($_POST['password'])) {
        $password1 = test_input($_POST['psw']);
    }

    $numberquery = "SELECT code FROM users WHERE email = '$email'";
    $numberresult = mysqli_query($dbc, $numberquery);


    $nrrow = mysqli_fetch_array($numberresult);
    $code = $nrrow['code'];


    $inlogquery = $dbc->prepare("SELECT email, password FROM users WHERE email = ? AND password = ?");
    $inlogquery->bind_param("ss", $email, $password1);
    $inlogquery->execute();
    $result = $inlogquery->get_result() or die("Error");


    $rows = mysqli_num_rows($result);
    if ($rows == 1)
    {
        $_SESSION["email"] = "$email";
        $_SESSION["code"] = "$code";
        header('Location: http://student.local/account.php');
    }
    else {
        echo "Verkeerde gebruikersnaam en/of wachtwoord";
    }


    $dbc->close();
}
?>
</html>