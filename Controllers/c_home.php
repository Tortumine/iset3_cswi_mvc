<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 16-08-17
 * Time: 12:29
 */
require_once 'Models/users.php';
require_once 'Views/view.php';
class C_home
{
    public function __construct() {}
    public function Home()
    {
        if (isset($_SESSION['log']) && ($_SESSION['lvl'] == 5))
        {
            $view = new View("home");
            $user= new user();
            $users = $user->GetUsersLogin();
            $view->generate(array('message'=>('Welcome '.$_SESSION['log']),'users'=>$users));
        }
        elseif (isset($_SESSION['log']) && ($_SESSION['lvl'] == 10))
        {
            $view = new View("home");
            $user= new user();
            $users = $user->GetUsers();
            $view->generate(array('message'=>('Welcome '.$_SESSION['log']),'users'=>$users));
        }
        else
        {
            $view = new View("home");
            $user= new user();
            $users = $user->GetUsersLogin();
            $view->generate(array('message'=>"Sign-in or Sign-up ?",'users'=>$users));
        }
    }
    public function SignIn($login,$password)
    {
        $login=htmlspecialchars($login);
        $password=htmlspecialchars($password);
        $user= new user();
        $tmp1=sha1($password);
        $tmp2=$user->CheckUser($login,$tmp1);
        if($tmp2!=0)
        {
            $_SESSION['lvl']=$tmp2;
            $_SESSION['log']=$login;
            header('Location: index.php'); //redirection index après login
        }
        else
        {
            $view = new View("home");
            $users = $user->GetUsersLogin();
            $view->generate(array('message'=>'Wrong login or password','users'=>$users));
        }
    }
    public function SignUpForm()
    {
        $view = new View("sign_up");
        $view->generate(array('message'=>''));
    }
    public function SignUp($login,$birth_date,$mail,$password)
    {
        $login=htmlspecialchars($login);
        $birth_date=htmlspecialchars($birth_date);
        $mail=htmlspecialchars($mail);
        $password=htmlspecialchars($password);

        $tmp= $this->SignUpInputTest($login,$birth_date,$mail,$password);

        if($tmp>0)
        {
            $view = new View("sign_up");
            $view->generate(array('message'=>'Form validation error on server side : '.$tmp));
        }
        else
        {
            $password=sha1($password);
            $user= new user();
            $user->AddUser($login,$birth_date,$mail,$password,5);
            header('Location: index.php');
        }
    }
    private function SignUpInputTest($login,$birth_date,$mail,$password)
    {
        $user= new user();
        $rep = 0;
        $users = $user->GetUsersLogin();
        foreach($users as $us){
            if($login == $us)
            {
                $rep=$rep+8;
            }
        }
        if(!(strtotime($birth_date)<strtotime("today"))){
            $rep=$rep+4;
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $rep=$rep+2;
        }
        if ((strlen($password)>16)||(strlen($password)<8))
        {
            $rep=$rep+1;
        }
        return $rep;
    }
}
