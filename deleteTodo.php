<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];

    function deleteAllTodos($arr) {
        $arr = [];
        setcookie('todos', json_encode($arr), true, time() - 3600);
        header('Location: index.php');
    }
    
    function deleteSingularTodo($arr) {
        $todoTitle = $_POST['todo_title'];
        unset($arr[$todoTitle]);
        setcookie('todos', json_encode($arr));
        header('Location: index.php');
    }

    if(isset($_POST['deleteAll'])) {
        deleteAllTodos($todos);
    }

    if(isset($_POST['todo_title'])) {
        deleteSingularTodo($todos);
    }
?>