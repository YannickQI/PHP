<?php

namespace QI\SistemaDeChamados\Controller;

session_start();

switch($_GET["operation"]){
    case "login":
        login();
        break;
    case "logout":
        logout();
        break;
    default:
        $_SESSION["msg_warning"] = "operação inválida!!!";
        header("location:../src/View/message.php");
        exit;
}

function logout(){
    unset($_SESSION["user_data"]);
    header("location:../../index.html");
    exit;
}

function login(){
    if(empty($_POST)){
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado!!!";
        header("location:../src/View/message.php");
        exit;
    }
    
    $users = array(
        array(
            "name" => "maria",
            "email" => "maria@gmail.com",
            "password" => password_hash("123",
            PASSWORD_DEFAULT),
        ),
        array(
            "name" => "joão",
            "email" => "joao@gmail.com",
            "password" => password_hash("123",
            PASSWORD_DEFAULT),
        )
    );
    
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];
    
    foreach ($users as $users) {
        if($email == $users["email"] && password_verify($password, $users["password"])) {
            $_SESSION["user_data"] = $users;
            header("location:../src/View/dashboard.php");
            exit;
        }
    }
    
    $_SESSION["msg_warning"] = "Usuário ou senha inválidos!!!";
    header("location:../src/View/message.php");
    exit;    
}
