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