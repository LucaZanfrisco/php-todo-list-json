<?php
    // Ricezione di un parametro tramite form in POST
    $add = isset($_POST['newTodo']) ? $_POST['newTodo'] : NULL;
    
    // Lettura e decodifica del file json
    $todo = file_get_contents(__DIR__.'/../todo.json');
    $todo = json_decode($todo,true);

    // Aggiunta del nuovo ToDo
    if($add !== NULL){
        $todo[] = [
            'text' => $add,
            'done' => false,
        ];
    };
    // Codifica in formato json
    $todo = json_encode($todo);
    // Aggiunta del Todo al file json
    file_put_contents(__DIR__.'/../todo.json',$todo);
    
    // Risposta in formtato json
    header('Content-Type: application/json');
    echo $todo;
?>