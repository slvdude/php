<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];
    $todoTitle = $_POST['done_todo'];
    if($todos[$todoTitle]['done'] == false) {
        $todos[$todoTitle]['done'] = true;
    } else {
        $todos[$todoTitle]['done'] = false;  
    }
    setcookie('todos', json_encode($todos));
    header('Location: index.php');
?>