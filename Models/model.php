<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 15-08-17
 * Time: 21:23
 */
class database
{
    private static $db_connection = NULL;
    private function __construct() {}
    private function __clone() {}

    protected function ExecuteQuery($sql, $params = null) {
        try{
            if ($params == null) {
                $resultat = $this->getBdd()->query($sql);
            }
            else {
                $resultat = $this->getBdd()->prepare($sql);
                $resultat->execute($params);
            }
            return $resultat;
        }
        catch (PDOException $erreur){
            //echo 'Erreur : '.$erreur->GetMessage();
            echo 'Erreur pendant le traitement des informations. Veuillez réessayer plus tard';
        }

    }

    public static function DBConnect()
    {
        if (!isset(self::$db_connection)) {
            self::$db_connection = new PDO('mysql:host=localhost;dbname=db;charset=utf8','user', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db_connection;
    }
}