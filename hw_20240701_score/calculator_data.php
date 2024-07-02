<?php

header('Content-Type: application/json');

     $data = [
        'a' => 1,
        'opt' => '+',
        'b' => 5
     ];
echo json_encode($data);

?>