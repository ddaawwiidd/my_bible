<?php
$komentarz ='';
$konsekwencja ='';
$wynik ='';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['komentarz'])){
        $komentarz = $_POST['komentarz'];
    }
    if(isset($_POST['konsekwencja'])){
        $konsekwencja = $_POST['konsekwencja'];
        $wynik = "$komentarz";
    }
    else {
        $wynik = str_replace('cholera',"***",$komentarz);
    }


}
?>
<html>
<form action="cenzura.php" method="POST">
    <fieldset>
        <legend>Dodaj komentarz</legend>
        <p>
            <lable>
                <textarea rows="10" cols="100" name="komentarz" placeholder="Wpisz swoj komentarz"></textarea>
            </lable>
        </p>
        <p>
            <lable>
                <input type="checkbox" name="konsekwencja" />
                Jestem swiadomy konsekwencji
            </lable>
        </p>
        <input type="submit" value="Wyslij">
    </fieldset>
    <body>
    <h1>Twoj komentarz</h1>
    <p>
        <?php
        echo ("$wynik");
        ?>
    </p>
    </body>
</html>
