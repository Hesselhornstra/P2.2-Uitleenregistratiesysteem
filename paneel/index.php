<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
/*if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}*/
$tolate = $con->query("SELECT * FROM artikeluit WHERE datumin < CURRENT_DATE()");
$now = $con->query("SELECT * FROM artikeluit WHERE datumin = CURRENT_DATE()");
$out = $con->query("SELECT * FROM artikeluit WHERE datumin > CURRENT_DATE()");
$artnaam = $con->query("SELECT * FROM artikelen");
$artiknaam = $con->query("SELECT * FROM artikelen");
$categorieen = $con->query("SELECT * FROM categorieen");

$naamart =  $_REQUEST['art-naam'];
$infoart = $_REQUEST['art-info'];
$fotoart =  $_REQUEST['art-foto'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['form'] == "art-nieuw") {
		$sql = "INSERT INTO artikelen VALUES ('$naamart','$infoart','$fotoart')";
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
	<title>Paneel - Uitleenregistratiesysteem</title>
	<link rel="stylesheet" href="/css/paneel.css">
	<script src="/js/paneel.js" defer></script>
</head>

<body>
	<button class="uitlog" onclick="location.href = `/loguit`">Uitloggen</button>
	<button class="uitlog" onclick="location.href = `/`">Artikelen</button>
	<hr>
	<center>
		<h2>Artikelen</h2>
		<button class="knop" onclick="artikelen('telaat')">Te Laat</button>
			<button class="knop" onclick="artikelen('vandag')">Vandaag inleveren</button>
			<button class="knop" onclick="artikelen('moment')">Uitgeleend/Geplanned</button>
		<div class="grote" id="telaat">
			<?php if (!$tolate->num_rows == 0) { ?>
				<table border='1'>
					<h3>Te laat</h3>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum uitleen</th>
							<th>Artikel</th>
							<th>Datum terug</th>
						</tr>
						<?php
						while ($row = $tolate->fetch_assoc()) {
							$producttolate = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
							$producttolate = $producttolate->fetch_assoc()
						?>
							<tr>
								<td><?= $row['naam'] ?></td>
								<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
								<td><?= $row['datumuit'] ?></td>
								<td><?= $producttolate['naam'] ?></td>
								<td><?= $row['datumin'] ?></td>
							</tr>
						<?php
						}
						?>
					</thead>
				</table>
			<?php } else { ?>
				<h3>Er zijn geen te laat ingeleverde artikelen</h3>
			<?php } ?>
			<br><br><br>
		</div>
		<div class="grote" id="vandag">
			<?php if (!$now->num_rows == 0) { ?>
				<table border='1'>
					<h3>Vandaag Inleveren</h3>
					<thead>
						<tr>
							<th>Naam</th>
							<th>Mail</th>
							<th>Datum uitleen</th>
							<th>Artikel</th>
							<th>Datum terug</th>
						</tr>
						<?php
						while ($row = $now->fetch_assoc()) {
							$producttoday = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
							$producttoday = $producttoday->fetch_assoc()
						?>
							<tr>
								<td><?= $row['naam'] ?></td>
								<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
								<td><?= $row['datumuit'] ?></td>
								<td><?= $producttoday['naam'] ?></td>
								<td><?= $row['datumin'] ?></td>
							</tr>
						<?php
						}
						?>
					</thead>
				</table>
			<?php } else { ?>
				<h3>Er zijn geen vandaag in te leverde artikelen</h3>
			<?php } ?>
			<br><br><br>
		</div>
		<center>
			<div class="grote" id="moment">
				<?php if (!$out->num_rows == 0) { ?>
					<table border='1'>
						<h3>Uitgeleend/Geplanned</h3>
						<thead>
							<tr>
								<th>Naam</th>
								<th>Mail</th>
								<th>Datum uitleen</th>
								<th>Artikel</th>
								<th>Datum terug</th>
							</tr>
							<?php
							while ($row = $out->fetch_assoc()) {
								$productstil = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
								$productstil = $productstil->fetch_assoc()
							?>
								<tr>
									<td><?= $row['naam'] ?></td>
									<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
									<td><?= $row['datumuit'] ?></td>
									<td><?= $productstil['naam'] ?></td>
									<td><?= $row['datumin'] ?></td>
								</tr>
							<?php
							}
							?>
						</thead>
					</table>
				<?php } else { ?>
					<h3>Er zijn geen vandaag in te leverde artikelen</h3>
				<?php } ?>
				<br><br><br>
			</div>
			<br><br>
			<hr>
			<br>
			<center>
			<button class="knop" onclick="artikel('toe')">Toevoegen</button>
			<button class="knop" onclick="artikel('wij')">Wijzigen</button>
			<button class="knop" onclick="artikel('ver')">Verwijderen</button>
				<div id="toe">
				<h3>Toevoegen</h3>
				<table border=1>
					<thead>
						<tr>
							<th>categorie</th>
							<th>Naam artikel</th>
							<th>Info artikel</th>
							<th>Link foto</th>
						</tr>
					</thead>
			</center>
			<tbody>
				<td><select name="select" value="" onChange="form.submit()">
						<option value="">Selecteer een categorie</option>
						<?php while ($row = $categorieen->fetch_assoc()) { ?>
							<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
						<?php } ?>
					</select></td>
				<form method="post">
					<input type="hidden" name="form" value="art-nieuw">
					<td><input type="text" name="art-naam" required></td>
					<td><input type="text" name="art-info" required></td>
					<td><input type="text" name="art-foto" required></td>
					<td><button name="registreer">registreer</button></td>
			</tbody>
			</form>
			</table>
			</div>
			<br>
			<center>
                <div id="wij">
				<h3>Aanpassen</h3>
				<table border=1>
					<thead>
						<tr>
							<th>Artikel</th>
							<th>Naam artikel</th>
							<th>Info artikel</th>
						</tr>
					</thead>
			</center>
			<tbody>
				<?php $categorieen = $con->query("SELECT * FROM categorieen"); ?>
				<td>
					<select>
						<option value="">Selecteer een artikel</option>
						<?php while ($row = $artnaam->fetch_assoc()) { ?>
							<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
						<?php } ?>
					</select>
				</td>

				<td><input type="text" required></td>
				<td><input type="text" required></td>
				<td><input type="submit" name="Verstuur" value="aanpassen"></td>
			</tbody>
			</form>
			</table>
			</div>
			<br>
			<center>
				<div id="ver">
				<h3>verwijderen</h3>
				<table border=1>
					<thead>
						<tr>

							<th>Naam artikel</th>
						</tr>
					</thead>
			</center>
			<tbody>

				</td>
				<td><select>
						<option value="">Selecteer een artikel</option>
						<?php while ($row = $artiknaam->fetch_assoc()) { ?>
							<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
						<?php } ?>
					</select></td>
				<td><input type="submit" name="Verstuur" value="verwijderen"></td>
			</tbody>
			</form>
			</table>
			</div>
			<br><br>
			<hr>
			<h2>Account</h2>
			<button class="knop" onclick="categorie('ctoe')">Toevoegen</button>
			<button class="knop" onclick="categorie('cwij')">Wijzigen</button>
			<button class="knop" onclick="categorie('cver')">Verwijderen</button>
			<div id="atoe">
				<form method="POST">
					<h3>Toevoegen</h3>
					<input type="hidden" name="form" value="atoevoegen">
					<input type="text" name="nname" placeholder="Naam" required>
					<input type="password" name="npass" placeholder="Wachtwoord" required>
					<button>Toevoegen</button>
				</form>
			</div>
			<div id="aaan">
				<form method="POST">
					<h3>Aanpassen</h3>
					<input type="hidden" name="form" value="aaanpassen">
					<select name="select">
						<option value="">Selecteer een gebruiker</option>
						<?php $accounts = $con->query("SELECT * FROM users");
						while ($row = $accounts->fetch_assoc()) { ?>
							<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="nname" placeholder="Nieuwe naam" required>
					<input type="password" name="npass" placeholder="Nieuwe wachtwoord" required>
					<button>Aanpassen</button>
				</form>
			</div>
			<div id="aver">
				<form method="POST">
					<h3>Verwijderen</h3>
					<input type="hidden" name="form" value="averwijder">
					<select name="select" required>
						<option value="">Selecteer een gebruiker</option>
						<?php $accounts = $con->query("SELECT * FROM users");
						while ($row = $accounts->fetch_assoc()) { ?>
							<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
						<?php } ?>
					</select>
					<button>Verwijderen</button>
				</form>
			</div>
			<br><br><br>
</body>

</html>