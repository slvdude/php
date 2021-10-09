<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];
    
    function doneAllTodos($arr) {
        foreach($arr as $key1 => $todo) {
            $arr[$key1]['done'] = true;
        }
        setcookie('todos', json_encode($arr));
        header('Location: index.php');
    }

    function doneSingularTodo($arr) {
        $todoTitle = $_POST['done_todo'];
        foreach($arr as $key => $todo) {
            if($key == $todoTitle) {
                if($arr[$key]['done'] == false) {
                    $arr[$key]['done'] = true;
                } 
                else {
                    $arr[$key]['done'] = false;
                }
            }
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