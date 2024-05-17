<?php

include 'connection.php';

function send_query($query, $fetching=true, $fetch_all=true){
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    if($fetching){
        if($fetch_all){
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }
}


function create_jwt($payload, $secret_key="key"){
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', $base64UrlHeader . '.' . $base64UrlPayload, $secret_key, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    $jwt = $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;
    return $jwt;
}

function read_jwt($jwt, $secret_key="key"){
    $parts = explode('.', $jwt);
    if(count($parts) !== 3) {
        throw new Exception('Invalid JWT');
    }
    $header = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $parts[0])), true);
    $payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $parts[1])), true);
    $signature = hash_hmac('sha256', $parts[0] . '.' . $parts[1], $secret_key, true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    if($base64UrlSignature !== $parts[2]) {
        throw new Exception('Invalid JWT signature');
    }
    return $payload;
}


function check_input($input, $is_email=true, $is_username=false) {
    $email_pattern = '/^[(a-z0-9).-]+@([(a-z0-9)-]+\.)+[(a-z0-9)-]{2,4}$/';
    $password_pattern = '/^(?!.*\s).{8,}$/';
    $username_pattern = '/^[a-zA-Z]{1,20} [a-zA-Z]{1,50}$/';

    if($is_email) {
        if(preg_match($email_pattern, $input)){
            return true;
        }
        return false;
    }

    else if($is_username) {
        if(preg_match($username_pattern, $input)){
            return true;
        }
        return false;
    }

    else {
        if(preg_match($password_pattern, $input)){
            return true;
        }
        return false;
    }
}

?>