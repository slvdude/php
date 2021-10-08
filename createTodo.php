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
        header('Location: index.php'); 
    }

    if(isset($_POST['submit'])) {
        createTodo($todos, $_POST['title']);
    }
?>