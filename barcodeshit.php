<DOCTYPE=<html>
    <title>hello there</title>
    <h1>tester</h1>
</html>
<form method="POST">
                    <input type="text" name="naam" placeholder="naam" required><br><br>
                    
                    <button type="submit">Bestel</button>
</form>
                    <?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
$con->query("
    INSERT INTO
    bacode
    (
    naam
    '".$con->real_escape_string($_POST['naam'])."'
    )
");
    }
?>