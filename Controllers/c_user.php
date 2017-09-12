<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 16-08-17
 * Time: 12:29
 */
require_once 'Models/users.php';
require_once 'Views/view.php';
class C_user
{
    public function __construct() {}
    public function UserUpdateForm5()
    {
        $user= new user();

        $user5 = $user->GetUser($_SESSION['log']);

        $view = new View("update5");
        $view->generate(array('message'=>'Want to change some thing ?','user5'=>$user5));
    }
    public function UserUpdate5($login,$birth_date,$mail,$password)
    {
        $login=htmlspecialchars($login);
        $birth_date=htmlspecialchars($birth_date);
        $mail=htmlspecialchars($mail);
        $password=htmlspecialchars($password);
        $password=sha1($password);
        $user= new user();
        $user->UpdateUser($login,$birth_date,$mail,$password,5);
        header('Location: index.php?action=update_user_form'); //redirection fom modif



    }
    public function UserUpdateForm10($log)
    {
        $user= new user();
        $userTmp = $user->GetUser($log);
        $view = new View("update10");
        $view->generate(array('message'=>'','user5'=>$userTmp));
    }
    public function UserUpdate10($login,$birth_date,$mail,$password,$lvl)
    {
        $login=htmlspecialchars($login);
        $birth_date=htmlspecialchars($birth_date);
        $mail=htmlspecialchars($mail);
        $password=htmlspecialchars($password);
        $password=sha1($password);
        $lvl=htmlspecialchars($lvl);
        $user= new user();
        $user->UpdateUser($login,$birth_date,$mail,$password,$lvl);
        header('Location: index.php'); //redirection modif
    }
    public function UserDelete10($login)
    {
        $login=htmlspecialchars($login);
        $user= new user();
        $user->DeleteUser($login);
        header('Location: index.php'); //redirection modif
    }
}