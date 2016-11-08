<?php
class AccesoDatos
{
    //Atributos
    private static $_objAccesoDatos;
    private $_objPDO;
		//IMPLEMENTAR...
    private function __construct()
    {
		//IMPLEMENTAR...
        try {
            $this->_objPDO = new PDO('mysql:host=localhost;dbname=login_pdo;charset=utf8','root','123',array(PDO::ATTR_EMULATE_PREPARES=>false,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $this->_objPDO-exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Error".'<br>'.$e->getMessage();
            die();
        }

    }

    public function RetornarConsulta($sql)
    {
		//IMPLEMENTAR...
    }

     public function RetornarUltimoIdInsertado()
    {
		//IMPLEMENTAR...
    }

    public static function dameUnObjetoAcceso()
    {
		//IMPLEMENTAR...
    }

    public function __clone()
    {
 		//IMPLEMENTAR...
    }
}
