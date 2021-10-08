<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];

    function createTodo($arr, $title) {
        $todoTitle = $title;
        array_push($arr, [
            'id' => uniqid(),
            'text' => $todoTitle,
            'done' => false
        ]);
        setcookie('todos', json_encode($arr)); 
    }

    function deleteAllTodos($arr) {
        $arr = [];
        setcookie('todos', json_encode($arr), true, time() - 3600);
    }

    function doneAllTodos($arr) {
        foreach($arr as $todo) {
            $todo['done'] = true;
        }
        setcookie('todos', json_encode($arr));
    }

    if(isset($_POST['submit'])) {
        createTodo($todos, $_POST['title']);
    }

    if(isset($_POST['deleteAll'])) {
        deleteAllTodos($todos);
    }

    if(isset($_POST['doneAll'])) {
        doneAllTodos($todos);
    }  

    header('Location: index.php');
?>