<?php


$method = $_SERVER['REQUEST_METHOD'];
if($method != 'POST'){
    ThrowError(403,"Only POST Method is allowed");
}


$data = json_decode(file_get_contents('php://input'), true);
$str = $data['input'];
if($str == []){
    ThrowError(500,"Please make sure the data has a valid input field in JSON format");
}

//truncate and count the wrords
$words = array_count_values(str_word_count($str, 1));
//sort the words according to count;
arsort($words);
//get the first 10 highest occurence words
$output = array_slice($words, 0, 10);
//return the results
header('Content-type:application/json;charset=utf-8');
echo json_encode($output);


function ThrowError($code,$message){
    header('Content-type:application/json;charset=utf-8');
    http_response_code($code);
    $error = new stdClass;
    $error->ErrorCode = $code;
    $error->ErrorMessage = $message;
    echo json_encode($error);
    exit(0);
}
?>