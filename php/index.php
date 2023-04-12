<?php
    $todo = file_get_contents(__DIR__.'/../todo.json');
    $todo = json_decode($todo,true);

    header('Content-Type: application/json');
    echo json_encode($todo);
?>