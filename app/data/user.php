<?php require_once(__DIR__.'/../../vendor/autoload.php');
use raymondoor\DBstatement;

$usrnm = str_rot13('admin'); // Username
$pswrd = password_hash('admin', PASSWORD_DEFAULT); // Password
try{
    $query = new DBstatement('INSERT INTO user (username, password) VALUES (:username, :password)');
    $execute = $query->execute([':username' => $usrnm, ':password' => $pswrd]);
    echo $execute; // Should return 1 if successful.
}catch(Exception $e){
    echo $e->getMessage();
}

// To delete user "admin", uncomment below, and comment above.
/*
$usrnm = str_rot13('admin');
try{
    $query = new DBstatement('DELET FROM user WHERE username = :username');
    $execute = $query->execute([':username' => $usrnm]);
    echo $execute; // Should return 1 if successful.
}catch(Exception $e){
    echo $e->getMessage();
}
*/