<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php
$servername = "den1.mysql6.gear.host";
$username = "colyseum1";
$password = "Gq2G-~NVys3g";

// Create connection
$pdo = new PDO('mysql:host=den1.mysql6.gear.host;dbname=colyseum1;charset=utf8','colyseum1',"Gq2G-~NVys3g");

?>
<h2>Liste des clients</h2>
<?php
// SELECT CLIENTS
echo "coucou";
try {
    $pdo -> query ("qsdqsdfirstname,lastname FROM clients"); 
    foreach ($pdo -> query ("SELECT firstname,lastname FROM clients") as $key => $value) {
        echo ($value[0]." ".$value[1]. " // ");
    }
    //$pdo = null;
}
    catch (PDOException $e){
        echo "Error!: ".$e->getMessage()."<br>";
        die();
    }



?> 
<h2>Types de spectacles</h2>
<?php
try {
    foreach ($pdo -> query ("SELECT (`type`) FROM showTypes") as $key => $value) {
        echo $value[0].' // ';
    }
    //$pdo = null;
}   catch (PDOException $e){
    print "Error!: ".$e->getMessage()."<br/>";
}

?>
<h2>20 premiers clients</h2>
<?php
foreach ($pdo -> query('SELECT firstname,lastname FROM clients') as $key => $value) {
    if ($key<20){
        echo $value[0].' '.$value[1].' // ';
    }
}
?>
<h2>Client avec carte de fidélité</h2>
<?php
foreach ($pdo->query("SELECT * FROM clients INNER JOIN cards ON clients.cardNumber = cards.cardNumber WHERE cardTypesId = 1") as $value) {
    echo($value["lastName"]." ".$value["firstName"]." // ");
}
?>
<h2>Commence par M</h2>
<?php
foreach ($pdo->query("SELECT * FROM clients WHERE lastName LIKE 'm%' ORDER BY lastname asc") as $key => $value) {
    echo 'Nom : '.$value[1].' // Prenom : '.$value[2].' <br>';
}
?>

<?php
?>

<h2>EXO 7</h2>
<?php
$exo7first = "SELECT firstName,lastName,birthDate,card, cardNumber FROM clients";
foreach ($pdo->query($exo7first) as $key => $value) {
    if($value[3] == 0){
        echo 'Nom : '.$value[0].' // Prenom : '.$value[1].' // Date : '.$value[2].' // carte : '.'NON <br>';    
    }
    if ($value[3] == 1) {
        echo 'Nom : '.$value[0].' // Prenom : '.$value[1].' // Date : '.$value[2].' // carte : '.' OUI // Numéro : '.$value[4].'<br>';
        // echo $value[4];
    }
    
}
?>
</body>
</html>