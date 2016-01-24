<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['number']) && count($_POST['number']) == 6){
        $player_pool = array_keys($_POST['number']);
    }
    else{
        echo("<h1>Pick 6 numbers</h1>");
    }
}
$pool = range(2,50);
$random_pool = array_rand($pool,6);
$result = array_intersect($random_pool,$player_pool);

?>

<html>
    <body>
        <form action="lotery_beta.php" method="POST">
            <fieldset>
                <legend>Superball, pick 6 numbers to win!!!</legend>
                <?php
                for($box = 1; $box < 50; $box = $box +1):?>
                <label>
                    <input type="checkbox" name="number[<?php echo $box?>]" />
                    <?php echo $box;?>
                    <?php if($box % 10 == 0) echo '<br>';?>
                    <?php endfor;?>
                </label>
            </fieldset>
            <p>
                <input type="submit" value="Draw numbers"/>
            </p>
    </body>
</html>
<?php
echo("<h1>Winning numbers are:</h1>");
foreach($random_pool as $number){
    echo("$number<br>");
}
echo("<h1>Matching numbers are:</h1>");
foreach($result as $i){
    echo("$i<br>");
}
?>