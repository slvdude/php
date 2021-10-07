<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];
    if(isset($_POST['submit'])) {
        $todoTitle = $_POST['title'];
        array_push($todos, [
            'id' => uniqid(),
            'text' => $todoTitle,
            'done' => false
        ]);
        setcookie('todos', json_encode($todos));
    }

    if(isset($_POST['deleteAll'])) {
        $todos = [];
        setcookie('todos', json_encode($todos), time() - 3600);
    }

    if(isset($_POST['doneAll'])) {
        print_r($_POST['doneAll']);
        foreach($todos as $todo) {
            $todos['done'] = true;
        }
        setcookie('todos', json_encode($todos));
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Task list</h1>
        <hr>
        <form action="" method="POST" class="create_task">
            <input type="text" placeholder="Enter a task" name="title" class="input_task">
            <button type="submit" class="add_task" name="submit">Add task</button>
        </form>
        <form action="" method="POST">
            <button class="handle_task" type="submit" name="deleteAll">Remove all</button>
            <button class="handle_task" type="submit" name="doneAll">Ready all</button>   
        </form>
        <hr>
            <?php if(!empty($todos)): ?>     
                <ul>
                    <?php foreach($todos as $key => $todo): ?>
                    <form method="POST">
                        <li>
                            <div class='todo_container'>
                                <div>
                                    <p class='todo_title'><?php echo $todo['text'] ?></p>
                                        <button class='handle_todo' type="submit" name="deleteTodo">Ready</button>
                                        <button class='handle_todo' type="submit" name="doneTodo">Delete</button>
                                </div>
                                <div class='round<?php echo $todo['done']? '-done': ''?>'></div>
                            </div>
                        </li>
                    </form>
                    <?php endforeach; ?>
                </ul>
            <?php else: echo '<p>No tasks yet</p>'?>
            <?php endif; ?>
    </div>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
