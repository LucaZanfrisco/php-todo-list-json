<?php
    // Ricezione di un parametro tramite form in POST o GEt
    $add = isset($_POST['newTodo']) ? $_POST['newTodo'] : '';
    $done = isset($_POST['done']) ? $_POST['done'] : NULL;
    $delete = isset($_POST['delete']) ? $_POST['delete'] : NULL;
    
    // Lettura e decodifica del file json
    $todo = file_get_contents(__DIR__.'/../todo.json');
    $todo = json_decode($todo,true);

    // Aggiunta del nuovo ToDo
    if($add !== ''){
        $todo[] = [
            'text' => $add,
            'done' => false,
        ];
    };
    // Modfica della variabile di done nell'array associativo
    if($done !== NULL){
        if(!$todo[$done]['done']){
            $todo[$done]['done'] = true;
        }else{
             $todo[$done]['done'] = false;
        }
    };
    // Cancella l'elemento selezionato dal file json
    if($delete !== NULL){
        array_splice($todo,$delete);
    };

    // Codifica in formato json
    $todo = json_encode($todo);
    // Aggiunta del Todo al file json
    file_put_contents(__DIR__.'/../todo.json',$todo);
    
    // Risposta in formtato json
    header('Content-Type: application/json');
    echo $todo;
?>