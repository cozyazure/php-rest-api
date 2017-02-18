<?php
    header('Content-type:application/json;charset=utf-8');
    $method = $_SERVER['REQUEST_METHOD'];
    //ensure its a post
    if($method == 'POST'){
        $data = json_decode(file_get_contents('php://input'), true);
        $str = $data['input'];
        //truncate and count the wrords
        $words = array_count_values(str_word_count($str, 1)); 
        //sort the words according to count;
        arsort($words);
        //get the first 10 highest occurence words
        $output = array_slice($words, 0, 10);
        echo json_encode($output);
    }

?>