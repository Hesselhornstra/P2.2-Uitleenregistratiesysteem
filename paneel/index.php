<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
/*if ($_SESSION['loggedin'] != true) {
	Header("Location: /");
}*/
$tolate = $con->query("SELECT * FROM artikeluit WHERE datumin < CURRENT_DATE()");
$now = $con->query("SELECT * FROM artikeluit WHERE datumin = CURRENT_DATE()");
$out = $con->query("SELECT * FROM artikeluit WHERE datumin > CURRENT_DATE()");
$artnaam = $con->query("SELECT * FROM artikelen");
$categorieen = $con->query("SELECT * FROM categorieen");

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
<button class="uitlog" onclick="location.href = `/loguit`">Uitloggen</button>
<button class="uitlog" onclick="location.href = `/`">Artikelen</button>
	<hr>
	<center>
		<h2>Artikelen</h2>
			<button class="knop" onclick="artikelen('telaat')">Te Laat</button>
			<button class="knop" onclick="artikelen('vandag')">Vandaag inleveren</button>
			<button class="knop" onclick="artikelen('moment')">Uitgeleend/Geplanned</button>
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
		</div>
		<?php
		while ($row = $now->fetch_assoc()) {
			$productnow = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
			$productnow = $productnow->fetch_assoc()
		?>
			<tbody>
				<tr>
					<td><?= $row['naam'] ?></td>
					<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
					<td><?= $row['datumuit'] ?></td>
					<td><?= $productnow['naam'] ?></td>
					<td><?= $row['datumin'] ?></td>
				</tr>
			</tbody>
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
			</div>
			<?php
			while ($row = $out->fetch_assoc()) {
				$productout = $con->query("SELECT * FROM artikelen WHERE barcode='" . $row['barcode'] . "'");
				$productout = $productout->fetch_assoc()
			?>
				<tbody>
					<tr>
						<td><?= $row['naam'] ?></td>
						<td><a href="mailto:<?= $row['mail'] ?>"><?= $row['mail'] ?></a></td>
						<td><?= $row['datumuit'] ?></td>
						<td><?= $productout['naam'] ?></td>
						<td><?= $row['datumin'] ?></td>

					</tr>
				</tbody>
			<?php
			}
			?>
			</table>
		</center> <br><br><br><br>
		<hr>
		<center>
			<button class="knop" onclick="artikel('toe')">Toevoegen</button>
			<button class="knop" onclick="artikel('wij')">Wijzigen</button>
			<button class="knop" onclick="artikel('ver')">Verwijderen</button><br>
				<caption>Toevoegen</caption>
					<table border=1>
					<thead>
						<tr>
							<th>catagorie</th>
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
				<td><input type="text" required></td>
				<td><input type="text" required></td>
				<td><input type="text" required></td>
				<td><input type="submit" name="Verstuur" value="registreer"></td>
			</tbody>
			</form>
			</table>
			</div>
			<br>
			<center>

				<caption>Aanpassen</caption>
				<table border=1>
					<thead>
						<tr>
							<th>Artikel</th>
							<th>Naam artikel</th>
							<th>Info artikel</th>
							<th>Link foto</th>
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
			<td><input type="text" required></td>
			<td><input type="submit" name="Verstuur" value="registreer"></td>
		</tbody>
		</form>
		</table>
		</div>
		<br>
		<center>
			<caption>verwijderen</caption>
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
					<?php while ($row = $artnaam->fetch_assoc()) { ?>
						<option value="<?php echo $row['naam'] ?>"><?php echo $row['naam'] ?></option>
					<?php } ?>
				</select></td>
			<td><input type="submit" name="Verstuur" value="registreer"></td>
		</tbody>
		</form>
		</table>
		</div>
		<h2>Account</h2>
			<button class="knop" onclick="account('atoe')">Toevoegen</button>
			<button class="knop" onclick="account('aaan')">Aanpassen</button>
			<button class="knop" onclick="account('aver')">Verwijderen</button>
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