<style>
    .hero{
        background-image: url("public/img/header-nutriSport-2.jpg");
    }
</style>
<body id="top">
<section class="hero">
    <section class="navigation">
        <header>
            <div class="header-content">
                <div class="logo"><a href="#"><img src="public/img/Logo_NutriSport.png" Nutri'Sport Logo"></a>
                </div>

            </div>
        </header>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-6 col-md-10 col-md-offset-1 tabProd">
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
            </div>
        </div>
    </div>


</section>



</body>
</html>



