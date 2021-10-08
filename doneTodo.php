<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];

    function doneAllTodos($arr) {
        foreach($arr as $todo) {
            $todo['done'] = true;
        }
        setcookie('todos', json_encode($arr));
        header('Location: index.php');
    }

    function doneSingularTodo($arr) {
        $todoTitle = $_POST['done_todo'];
        if($arr[$todoTitle]['done'] == false) {
            $arr[$todoTitle]['done'] = true;
        } else {
            $arr[$todoTitle]['done'] = false;  
        }
        setcookie('todos', json_encode($arr));
        header('Location: index.php');
    }

    if(isset($_POST['doneAll'])) {
        doneAllTodos($todos);
    }  

    if(isset($_POST['done_todo'])) {
        doneSingularTodo($todos);
    }
    
?>