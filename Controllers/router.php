<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 15-08-17
 * Time: 21:15
 */

require_once 'c_home.php';
require_once 'c_user.php';
require_once 'c_admin.php';
class Router
{
    private $ctrl_home;
    private $ctrl_user;
    private $ctrl_admin;

    public function __construct()
    {
        $this->ctrl_home = new c_home();
        $this->ctrl_user = new c_user();
        $this->ctrl_admin = new c_admin();
    }

    public function Routing_Request()
    {
        try {
            if (isset($_SESSION['log']) && ($_SESSION['lvl'] == 5))//user
            {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'sign_out')//sign in
                    {
                        session_destroy();
                        header('Location: index.php');
                    }
                    elseif ($_GET['action'] == 'update_user_form')
                    {
                        $this->ctrl_user->UserUpdateForm5();
                    }
                    elseif ($_GET['action'] == 'update5')
                    {
                        $login=$_SESSION['log'];
                        $mail=$_POST["userEmail"];
                        $birth=$_POST["userBirthDate"];
                        $password=$_POST["userPassword_A"];

                        $this->ctrl_user->UserUpdate5($login,$birth,$mail,$password);
                    }
                    else
                    {
                        $this->ctrl_home->Home();
                    }
                }
                else
                {
                    $this->ctrl_home->Home();
                }
            }
            elseif (isset($_SESSION['log']) && ($_SESSION['lvl'] == 10))//admin
            {
                if (isset($_GET['action']))
                {
                    if ($_GET['action'] == 'sign_out')
                    {
                        session_destroy();
                        header('Location: index.php');
                    }
                    elseif ($_GET['action'] == 'update_user_form')
                    {
                        $this->ctrl_user->UserUpdateForm5();
                    }
                    elseif ($_GET['action'] == 'update5')
                    {
                        $login=$_SESSION['log'];
                        $mail=$_POST["userEmail"];
                        $birth=$_POST["userBirthDate"];
                        $password=$_POST["userPassword_A"];

                        $this->ctrl_user->UserUpdate5($login,$birth,$mail,$password);
                    }
                    elseif ($_GET['action'] == 'get_user')
                    {
                        if(isset($_GET['user']))
                        {
                            $user=$_GET['user'];
                            $this->ctrl_user->UserUpdateForm10($user);
                        }
                        else
                        {
                            $this->ctrl_home->Home();
                        }
                    }
                    elseif ($_GET['action'] == 'update10')
                    {
                        if(isset($_GET['user']))
                        {
                            $user=$_GET['user'];
                            $mail=$_POST["userEmail"];
                            $birth=$_POST["userBirthDate"];
                            $password=$_POST["userPassword_A"];
                            $lvl=$_POST["userLevel"];
                            $this->ctrl_user->UserUpdate10($user,$birth,$mail,$password,$lvl);
                        }
                        else
                        {
                            $this->ctrl_home->Home();
                        }
                    }
                    elseif ($_GET['action'] == 'delete_user')//sign up
                    {
                        $user=$_GET['user'];
                        $this->ctrl_user->UserDelete10($user);
                    }
                    else
                    {
                        $this->ctrl_home->Home();
                    }
                }
                else
                {
                    $this->ctrl_home->Home();
                }
            }
            else
            {
                $_SESSION['lvl'] = 1;

                if (isset($_GET['action']))
                {
                    if ($_GET['action'] == 'sign_in')//sign in
                    {
                        $login = $_POST["userName"];
                        $password = $_POST["userPassword"];

                        if (isset($login) && isset($password)) {
                            $this->ctrl_home->SignIn($login, $password);
                        } else {
                            $this->ctrl_home->Home();
                        }
                    } elseif ($_GET['action'] == 'sign_up_form')//sign up
                    {
                        $this->ctrl_home->SignUpForm();
                    }

                    elseif ($_GET['action'] == 'sign_up')//sign up
                    {
                        $login = $_POST["userName"];
                        $birth_date = $_POST["userBirthDate"];
                        $mail = $_POST["userEmail"];
                        $password = $_POST["userPassword_A"];
                        if($login)$this->ctrl_home->SignUp($login,$birth_date,$mail,$password);
                        else $this->ctrl_home->Home();

                    }
                    else
                    {
                        $this->ctrl_home->Home();
                    }
                }
                else
                {

                    $this->ctrl_home->Home();
                }
            }

    }
    catch (Exception $e)
    {
        $this->error($e->getMessage());} //rooting errors

    }
    private function error($e)
    {
        $view = new View("error");
        $view->generate(array('php_errormsg'=>$e));
    }
    private function GetParameter($array, $name)
    {
        if (isset($tableau[$name]) && !empty($array[$name])) {
            return $tableau[$name];
        } else
            return null;
    }
}