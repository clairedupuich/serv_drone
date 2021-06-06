<?php
class myPDO {
    private const HOST_NAME = "localhost";
    private const DB_NAME = "servdrone";
    private const USER_NAME = "claire";
    private const PASSWORD = "claire";

    private static $myPDOInstance = null;

    public static function getPDO() {
        if(is_null(self::$myPDOInstance)){
            try {
                $connexion = "mysql:host=".self::HOST_NAME.";dbname=".self::DB_NAME;
                self::$myPDOInstance = new PDO($connexion, self::USER_NAME, self::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
            } catch(PDOException $exception){
                $errorMessage = "Erreur de connexion à la base de données".$exception->getMessage();
                die($errorMessage);
            }
            self::$myPDOInstance->exec("SET CHARACTER SET UTF8");
        }
        return self::$myPDOInstance;
    }
}
?>