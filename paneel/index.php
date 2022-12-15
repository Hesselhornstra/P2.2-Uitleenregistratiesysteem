<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<title>Paneel - Uitleenregistratiesysteem</title>
	<link rel="stylesheet" href="/css/paneel.css">
	<script src="js/main.js" defer></script>
</head>

<body>
	<p class="grote">uitloggen
	<p>
		<hr>
		<center>
			<div class="grote">
				<table border='1'>
					<caption>Te laat</caption> </BR>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum</th>
							<th>Artikel</th>
							<th>Datum terug</th>
							<th>specificaties</th>
						</tr>
					</thead>
				</table>
				<div>
		</center> <br><br><br><br>
		<hr>
		<center>
			<div class="grote">
				<table border='1'>
					<caption>Vandaag Inleveren</caption> </BR>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum</th>
							<th>Artikel</th>
							<th>Datum terug</th>
							<th>specificaties</th>
						</tr>
					</thead>
				</table>
				<div>
		</center> <br><br><br><br>
		<hr>
		<center>
			<div class="grote">
				<table border='1'>
					<caption>Momenteel Uitgeleend</caption> </BR>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum</th>
							<th>Artikel</th>
							<th>Datum terug</th>
							<th>specificaties</th>
						</tr>
					</thead>
				</table>
				<div>
		</center> <br><br><br><br>
		<hr>
</body>
<div style="border-style:solid;width:40%;">
	<table border='1'>
		<caption>Groep</caption>
		<tr>
			<th>Selecteer</th>
		</tr>
		<tr>
			<th>Laptops</th>
		</tr>
		<tr>
			<th>Tablets</th>
		</tr>
		<tr>
			<th>monitoren</th>
		</tr>
		<tr>
			<th>Camera's</th>
		</tr>
	</table>
</div>

</html>