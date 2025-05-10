<?php
namespace raymondoor{

class DBconnection{
    private static $dsn = 'sqlite:'.DATA_DIR.'/database.db'; // Edit here accordingly e.g. 'mysql:host=localhost;dbname=test' 'sqlite:/dir/database.db'
    private static $user = ''; // Username for DB
    private static $pass = ''; // Password for DB
    private static $errpath = DATA_DIR.DIRECTORY_SEPARATOR.'log'.'/error.log'; // Error Log Path

    private static $pdo = null;
    public static function connect(){
        if(self::$pdo === null){
            try{
                self::$pdo = new \PDO(self::$dsn,self::$user,self::$pass);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            }catch(\PDOException $e){
                if(!is_dir(self::$errpath)){
                    mkdir(self::$errpath, 0755);
                }
                $errmessage = 'DBconnection Failed: '.$e->getmessage();
                error_log($errmessage.PHP_EOL, 3, self::$errpath);
                throw new \Exception($errmessage);
            }
            return self::$pdo;
        }
        return self::$pdo;
    }
}

}