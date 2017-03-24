<form action="" method="POST">
    <div class="ui-widget">
        <label for="search-input">Votre sport :</label>
        <input type="text" name="sport" id="search-input" class="form-control"/>
    </div>
    <input type="submit" class="btn btn-default" name="search" value="Selectionner" />
</form>

<?php
if (isset($_POST['sport'])) {
    $sport = $_POST['sport'];
    $req = $pdo->prepare('SELECT * FROM bddsports WHERE name= :sport');
    $req->bindValue(':sport', $sport);
    $req->execute();
    $res = $req->fetch();
    echo '<br /><p>Vous avez choisi : '. $sport .' qui vous fait perdre : '. $res['kcalh'] .' kcal/h !</p><br />';
    $energyKcal = round(($energy/4.1868)*($quantity/100));
    $sportHours = floor($energyKcal/$res['kcalh']);
    $sportMinutes = round(($energyKcal/$res['kcalh']-floor($energyKcal/$res['kcalh']))*60);
    echo '<p>Il faut donc que vous fassiez '. $sportHours .' heures et '. $sportMinutes .' minutes de sport !!<br />Il y a encore du taf !</p>';
}
?>