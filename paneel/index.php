<?php
//require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
//if ($_SESSION['loggedin'] != true) {
//	Header("Location: /");
//}
?>
<style>
	.box {
		border-style: solid;
		font-size: auto;
		padding: 5px;
		padding-left: 12px;
		padding-right: 12px;
	}

	.bord {
		border-style: solid;
		height: 25%;
		width: 27%;
	}

	.boxton {
		border-style: solid;
		font-size: auto;
		padding: 5px;
		padding-left: 12px;
		padding-right: 12px;
		margin-right: -75%;
	}

	.boxol {
		border-style: solid;
		font-size: auto;
		padding: 5px;
		padding-left: 12px;
		padding-right: 12px;
		margin-left: -18%;
	}

	.tabl {
		margin-left: -75%;
		margin-top: -17.5%
	}

	.txt {
		height: 30%;
		width: 27.5%;
		margin-top: -12.5%;
	}
</style>
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
<center>
	<div class="bord">
		<br>
		<div>
			<a class="boxol">Groep</a>
			<a class="box">naam artikel</a>
			<a class="box">Hoeveelheid</a>
			<br><br><br><button class="boxton">Toevoegen</button>
		</div>
		<br>
		<table class="tabl" border='1'>
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
			<input class="txt" type="text">
			<input class="txt" type="text">
		</table>
	</div>
</center>
<center>
	<div class="bord">
		<br>
		<div>
			<a class="boxol">Groep</a>
			<a class="box">naam artikel</a>
			<a class="box">Hoeveelheid</a>
			<br><br><br><button class="boxton">Wijzigen</button>
		</div>
		<br>
		<table class="tabl" border='1'>
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
			<input class="txt" type="text">
			<input class="txt" type="text">
		</table>
	</div>
</center>
<center>
	<div class="bord">
		<br>
		<div>
			<a class="boxol">Groep</a>
			<a class="box">naam artikel</a>
			<a class="box">Hoeveelheid</a>
			<br><br><br><button class="boxton">Verwijderen</button>
		</div>
		<br>
		<table class="tabl" border='1'>
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
			<input class="txt" type="text">
			<input class="txt" type="text">
		</table>
	</div>
</center>

</html>