<?php
class ModelBase
{
    private static $connInfo;
    protected $db;
    protected $name;
	
	//コンストラクタはインスタンス作成時に関数実行
    public function __construct()
    {
        $this->initDb();
    }

    public function initDb()
    {
		try{
		$dsn= "mysql:host=".self::$connInfo['host'].
			  ";port=".self::$connInfo['port'].
			  ";dbname=".self::$connInfo['db'];
			$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"
			);
			
			$this->db = new PDO(
			$dsn, 
			self::$connInfo['user'], 
			self::$connInfo['password'],
			$options);
		}catch(PDOException $e){
			//エラー表示 確認
			print "error:".$e->getMessage()."</br>";
			die();			
		}	
    }

    public static function setConnectionInfo($connInfo)
    {
        self::$connInfo = $connInfo;
    }
}

?>