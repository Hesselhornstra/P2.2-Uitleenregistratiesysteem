<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
/*if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}*/
$artuit = $con->query("SELECT * FROM artikeluit");
$artid = $artuit->fetch_assoc();
$artikid = $con->query("SELECT * FROM artikelen WHERE id='" . $artid['id'] . "'");
$tolate = $con->query("SELECT * FROM artikeluit WHERE datumin < CURRENT_DATE()");
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
	<p class="grote">uitloggen</p>
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
					</tr>
				</thead>

		</div>
		<?php
		while ($row = $artuit->fetch_assoc()) {
		?>
			<?php
			while ($row = $tolate->fetch_assoc()) {
				$producttolate = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
				$producttolate = $producttolate->fetch_assoc()
			?>
				<tbody>
					<tr>
						<td><?= $row['naam'] ?></td>
						<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
						<td><?= $row['datumuit'] ?></td>
						<td><?= $producttolate['naam'] ?></td>
						<td><?= $row['datumin'] ?></td>
					</tr>
				</tbody>
			<?php
			}
			?>
			</table>
		<?php
		}
		?>
		</table>
	</center> <br><br><br><br>
	<hr>
	<<center>
		<div class="grote">
			<table border='1'>
				<caption>Vandaag inleveren</caption> </BR>
				<thead>
					<tr>
						<th>Naam</th>
						<th>Mail</th>
						<th>Datum</th>
						<th>Artikel</th>
						<th>Datum terug</th>
					</tr>
				</thead>
			</table>
		</div>
		<?php
		while ($row = $artuit->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $row["	naam"]; ?></td>
				<td><?php echo $row["mail"]; ?></td>
				<td><?php echo $row["datumin"]; ?></td>
				<td><?php echo $row["artikid"]; ?></td>
				<td><?php echo $row["datumuit"]; ?></td>
			</tr>
		<?php
		}
		?>
		</table>
		</center> <br><br><br><br>
		<hr>
		<center>
			<div class="grote">
				<table border='1'>
					<caption>Momenteel uitgeleend</caption> </BR>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum</th>
							<th>Artikel</th>
							<th>Datum terug</th>
						</tr>
					</thead>
				</table>
			</div>
			<?php
			while ($row = $artuit->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $row["naam"]; ?></td>
					<td><?php echo $row["mail"]; ?></td>
					<td><?php echo $row["datumin"]; ?></td>
					<td><?php echo $row["artikid"]; ?></td>
					<td><?php echo $row["datumuit"]; ?></td>
				</tr>
			<?php
			}
			?>
			</table>
		</center> <br><br><br><br>
		<hr>
		<center>
			<form action="post">

				<div class="bord">
					<br>
					<div>
						<a class="boxol">Groep</a>
						<a class="box">naam artikel</a>
						<a class="box">Info artikel</a>
						<a class="box">Foto artikel</a>
						<br>><button class="boxton">Toevoegen</button>
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
						<input class="txt" type="text">
					</table>
				</div>
		</center>
		<br>
		<center>
			<?php
			$query = "UPDATE artikelen SET name=?, info=?, img=? WHERE id=?";
			?>
			<div class="bord">
				<br>
				<div>
					<a class="boxol">Groep</a>
					<a class="box">naam artikel</a>
					<a class="box">Info artikel</a>
					<a class="box">Foto artikel</a>
					<br><button class="boxton">Wijzigen</button>
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
					<input class="txt" type="Text">
					<input class="txt" type="text">
				</table>
			</div>
		</center>
		<br>
		<center>
			<div class="bord">
				<br>
				<div>
					<a class="boxol">Groep</a>
					<a class="box">naam artikel</a>
					<a class="box">Info artikel</a>
					<a class="box">Foto artikel</a>
					<br><button class="boxton">Verwijderen</button>
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
					<input class="txt" type="Text">
					<input class="txt" type="text">
				</table>
			</div>
		</center>
</body>

</html>