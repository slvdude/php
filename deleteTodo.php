<?php
    print_r('1');
    $todos = json_decode($_COOKIE['todos'], true) ?? [];
    $todoTitle = $_POST['todo_title'];
    unset($todos[$todoTitle]);
    setcookie('todos', json_encode($todos));
    header('Location: index.php');
?>