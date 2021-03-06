<?php
    $todos = json_decode($_COOKIE['todos'], true) ?? [];
    print_r($todos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="todos.css">
</head>
<body>
    <div class="container">
        <h1>Task list</h1>
        <hr>
        <form action="createTodo.php" method="POST" class="create_task">
            <input type="text" placeholder="Enter a task" name="title" class="input_task">
            <button type="submit" class="add_task" name="submit">Add task</button>
        </form>
        <div class="handle_all">
            <form action="deleteTodo.php" method="POST">
                <button class="handle_task" type="submit" name="deleteAll">Remove all</button>   
            </form>
            <form action="doneTodo.php" method="POST">
                <button class="handle_task" type="submit" name="doneAll">Ready all</button>
            </form> 
        </div>
        <hr>
            <?php if(!empty($todos)): ?>     
                <ul>
                    <?php foreach($todos as $key => $todo): ?>
                        <li>
                            <div class='todo_container'>
                                <div>
                                    <p class='todo_title'><?php echo $todo['text'] ?></p>
                                    <div class="btn_container">
                                        <form action="doneTodo.php" method="POST">
                                            <input class='done_todo' type="hidden" name="done_todo" value="<?php echo $key?>"></input>
                                            <button class='done_todo' type="submit">Ready</button>
                                        </form>
                                        <form action="deleteTodo.php" method="POST">
                                            <input type="hidden" name="todo_title" value="<?php echo $key?>">
                                            <button class='delete_todo' type="submit">Delete</button>
                                        </form> 
                                    </div>
                                </div>
                                <div class='round<?php echo $todo['done']? ' done': ''?>'></div>
                            </div>
                        </li>
                        <hr>
                    <?php endforeach; ?>
                </ul>
            <?php else: echo '<p style="color: red; font-size: 20px;">No tasks yet</p>'?>
            <?php endif; ?>
    </div>
</body>
</html>
