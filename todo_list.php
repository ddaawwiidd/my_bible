<?php

if(isset($_COOKIE['todo'])) {
    $todo = unserialize($_COOKIE['todo']);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['task'])) {
        $todo[] = trim($_POST['task']);
        setcookie('todo', serialize($todo), time() + 3600*24);
    }
}
?>

<html>
<body>

<form action="todo_list.php" method="POST">
    <fieldset>
        <legend>Add task</legend>
        <label>
            Task:
            <input type ="text" name="task" placeholder="Add task">
        </label>
        <input type="submit" value="Add">
    </fieldset>
</form>
<h1>To Do list:</h1>

    <?php
    if(isset($_POST['task'])){
        echo("<ol>");
        foreach($todo as $i){
            echo("<li>$i</li>");
        }
        echo("</ol>");
    }
    else{
        echo("No tasks");
    }
    ?>

</body>


</html>
