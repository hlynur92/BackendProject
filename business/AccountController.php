<?php
include_once __DIR__ . "/../Persistence/AccountDAO.php";
class AccountController{

    public function login($email, $password){
        if(!isset($_SESSION['loggedin'])){
            $_SESSION['loggedin'] = 0;
        }

        for ($i = 0; $i < 10; $i++){
            $password = crypt($password, '$2a$07$rubberducksarethebest$');
        }

        $accountDAO = new AccountDAO();
        $admin = $accountDAO->GetAdminInfo($email);

        if ($password == $admin['AdminPassword']){
            $_SESSION['loggedin'] = 1;
            header("Location: " . $GLOBALS['URL'] . "presentation/admin/dashboard.php");
            exit;
        }else{
            $_SESSION['loggedin'] = 0;
        }
    }
}