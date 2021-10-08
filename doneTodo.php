<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];
    
    function doneAllTodos($arr) {
        foreach($arr as $key1 => $todo) {
            foreach($todo as $key2 => $el) {
                if($key2 == 'done') {
                    $arr[$key1][$key2] = true;
                }
            }  
        }
        setcookie('todos', json_encode($arr));
        header('Location: index.php');
    }

    function doneSingularTodo($arr) {
        $todoTitle = $_POST['done_todo'];
        foreach($arr as $key => $todo) {
            if($key == $todoTitle) {
                $rightIndex = $key;
                foreach($todo as $key1 => $el) {
                    if($key1 == 'done') {
                        if($arr[$key][$key1] === false) {
                            $arr[$key][$key1] = true;
                        } else {
                            $arr[$key][$key1] = false; 
                        }
                    }
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