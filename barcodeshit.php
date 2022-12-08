<DOCTYPE=<html>
    <title>hello there</title>
    <h1>tester</h1>
</html>

                    <input type="text" name="naam" placeholder="Woonplaats" required><br><br>
                    
                    <button type="submit">Bestel</button>
                    
                    <?php
require $_SERVER['DOCUMENT_ROOT'].'/config.php';

$con->query("
    INSERT INTO
    barcode
    (
    naam,
   barcode
    '".$con->real_escape_string($_POST['naam'])."',
    '".$con->real_escape_string($_POST['barcode'])."'
    )
");
?>