<?php

/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 15-08-17
 * Time: 21:44
 */
require_once('model.php');
class  user
{
    private static function in($tmp) //formatting input strings
    {
        $tmp = strip_tags($tmp);
        $tmp = htmlspecialchars($tmp);
        return $tmp;
    }

    public function AddUser($log,$bd,$mail,$pw)
    {
        //formatting params
        $log=$this->in($log);
        $bd=$this->in($bd);
        $mail=$this->in($mail);
        $pw=$this->in($pw);

        //default security lvl
        $lvl=5;

        //formatting date
        $bd = date('y/m/d', strtotime($bd));

        $db = database::DBConnect();
        $req = $db->prepare("CALL add_user(:log,:date,:mail,:pw,:lvl)");
        $req->execute(array(':log' => $log, ':date' => $bd, ':mail' => $mail, ':pw' => $pw , ':lvl' => $lvl));

    }
    public function UpdateUser($log,$bd,$mail,$pw,$lvl)
    {
        //formatting params
        $log=$this->in($log);
        $bd=$this->in($bd);
        $mail=$this->in($mail);
        $pw=$this->in($pw);
        $lvl=$this->in($lvl);

        //formatting date
        $bd = date('y/m/d', strtotime($bd));

        $db = database::DBConnect();
        $req = $db->prepare("CALL update_user(:log,:date,:mail,:pw,:lvl)");
        $req->execute(array(':log' => $log, ':date' => $bd, ':mail' => $mail, ':pw' => $pw , ':lvl' => $lvl));

    }
    public function GetUsersLogin()
    {
        $db = database::DBConnect();
        $req = $db->prepare("SELECT login from users ORDER BY login ASC");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
    public function GetUsers()
    {
        $db = database::DBConnect();
        $req = $db->prepare("SELECT * from users ORDER BY login ASC");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
    public function GetUser($log)
    {
        $log = user::in($log);
        $db = database::DBConnect();
        $req = $db->prepare("SELECT * from users WHERE login = :log");
        $req->execute(array(':log' => $log));
        $res = $req->fetch();
        return $res;
    }
    public function DeleteUser($log)
    {
        $log = user::in($log);
        $db = database::DBConnect();
        $req = $db->prepare("CALL delete_user(:log)");
        $req->execute(array(':log' => $log));
    }
    public function CheckUser($log,$hash)
    {
        $tmp0 = user::GetUser($log);
        $tmp1 = $tmp0['pass_word'];
        $tmp2 = strcmp($hash,$tmp1);
        if($tmp2==0)
        {
            $tmp3=$tmp0['security_level'];
            return $tmp3;
        }
        else return 0;
    }
}