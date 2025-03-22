<?php require_once(__DIR__.'/../../../vendor/autoload.php');

use raymondoor\DBstatement;
use raymondoor\rqst_validate;
use function raymondoor\return_header;
use function raymondoor\generate_log;

session_start();
$request = new rqst_validate();
if($_SERVER['REQUEST_METHOD'] === 'POST' && $request->csrf_gate('login')){
    if(count(array_filter($_POST)) === count($_POST)){
        $username = str_rot13($_POST['username']);
        $password = $_POST['password'];
        try{
            $query = new DBstatement('SELECT * FROM user WHERE username = :username');
            $result = $query->execute([':username' => $username]);
        }catch(Exception $e){
            $_SESSION['formerror'] = $e->getMessage();
            return_header('/admin/login.php?error=DB_Error');
        }
        if(!empty($result)){
            if(password_verify($password, $result[0]['password'])){
                $_SESSION['username'] = $username;
                $log_data = '"'.date("Y-m-d H:i:s").'", "Login"';
                generate_log('/login/login-', $log_data);
                unset($_SESSION['mistake']);
                return_header('/admin/?message=Welcome!');
            }else{
                $limit = 5; // Change here to set allow attempts
                $_SESSION['mistake'] ++;
                if($_SESSION['mistake'] >= $limit){
                    $_SESSION['login-over'] = true;
                    $log_data = '"'.date("Y-m-d H:i:s").'", "Block", "From: '.$_SERVER['REMOTE_ADDR'].'"';
                    generate_log('/login/login-', $log_data);
                    return_header('/admin/login.php?error=Cannot_Try_Anymore');
                }
                $_SESSION['formerror'] = 'Incorrect Password. Attempts left: '.$_SESSION['mistake'].'/'.$limit.'.';
                return_header('/admin/login.php?error=Wrong_Password');
            }
        }else{
            $_SESSION['formerror'] = 'Such Username doesn\'t Exist';
            return_header('/admin/login.php?error=Wrong_Username');
        }
    }else{
        $_SESSION['formerror'] = 'Please fill All Areas.';
        return_header('/admin/login.php?error=Fill_All');
    }
}