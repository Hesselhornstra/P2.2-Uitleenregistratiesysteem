<?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
if (isset($_SESSION['loggedin']) == true) {
	Header("Location: /paneel");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" AND $_POST['form'] == "login") {
	if (trim($_POST['username']) == NULL) {
		echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Error geen gebruikers naam ingevult!</div>';
	}
	if (trim($_POST['password']) == NULL) {
		echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Error geen wachtwoord ingevult!</div>';
	}
	
	$query = $con->query("SELECT * FROM users WHERE name = '".$con->real_escape_string($_POST['username'])."'");
	
	if ($query->num_rows == 1) {
		$row = $query->fetch_assoc();
		if (password_verify($_POST['password'],$row['password'])) {
            $_SESSION['loggedin'] = true;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $row['id'];
			
			if ($_SERVER['HTTP_REFFER'] != "") {
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			} else {
				if (isset($_SESSION['returnpage'])) {
					Header("Location: ".$_SESSION['returnpage']);
				} else {
					Header("Location: /paneel");
				}
			}
		} else {
			echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Gebruikersnaam en/of wachtwoord is onjuist!</div>';
		}
	} else {
		echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=`none`;">&times;</span>Gebruikersnaam en/of wachtwoord is onjuist!</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="icon" type="image/x-icon" href="/img/logo.png">
		<title>Login - Uitleenregistratiesysteem</title>
		<link rel="stylesheet" href="/css/login.css">
	</head>
	<body>
		<div class="inlogform">
			<h1>Inloggen</h1>
			<form method="POST" id="inlogform">
				<input type="hidden" name="form" value="login">
				<input type="text" name="username" placeholder="Gebruikersnaam" required><br>
				<input type="password" name="password" placeholder="Wachtwoord" required><br>
				<button type="submit">Inloggen</button>
			</form>
		</div>
	</body>
</html>