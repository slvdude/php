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

    function doneSingularTodo() {
        $todoTitle = $_POST['done_todo'];
        if($todos[$todoTitle]['done'] == false) {
            $todos[$todoTitle]['done'] = true;
        } else {
            $todos[$todoTitle]['done'] = false;  
        }
        setcookie('todos', json_encode($todos));
        header('Location: index.php');
    }

    if(isset($_POST['doneAll'])) {
        doneAllTodos($todos);
    }  

    if(isset($_POST['done_todo'])) {
        doneSingularTodo();
    }
    
?>