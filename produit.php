<?php

include('connect.php');

$options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

try {
    $bdd = new PDO(SERVER_DB, USER, PASS,$options );
} catch (Exception $e){
    die('Connexion à la base de données impossible');

}
$sql = 'SELECT * FROM sport';
$res = $bdd -> query($sql);
$req = $res -> fetchAll(PDO::FETCH_OBJ);

foreach ($req as $value) {
    echo '<h1>'.$value->sport.'</h1>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OFF</title>
</head>
<body>
<h2>Example Output</h2>
<table>
    <tr>
        <td>Product Name</td>
        <td>{productName}</td>
    </tr>
    <tr>
        <td>Brand</td>
        <td>{brand}</td>
    </tr>
    <tr>
        <td>Image</td>
        <td><img src="{image}"/></td>
    </tr>
    <tr>
        <td>Nutri Score</td>
        <td><img src="nutriscore-{nutriescore}.svg"/></td>
    </tr>
    <tr>
        <td>Ingrédients</td>
        <td>{ingredients}</td>
    </tr>
    <tr>
        <td>Calories</td>
        <td>{energy_value}{energy_unit}</td>
    </tr>
</table>
<h2>Response Struct (Array Format)</h2>
<pre>
    {json}
</pre>
</body>
</html>