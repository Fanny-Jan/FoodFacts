<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Food Facts TEAM</title>
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<H1>OPEN FOOD FACTS</H1>
<div class="container-fluid">
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
</div>

</body>
</html>