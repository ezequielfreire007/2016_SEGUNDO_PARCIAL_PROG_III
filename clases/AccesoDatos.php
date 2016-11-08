<?php
class AccesoDatos
{
    //Atributos
    private static $_objAccesoDatos;
    private $_objPDO;

    private function __construct()
    {
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
        return $this->_objPDO->prepare($sql);
    }

     public function RetornarUltimoIdInsertado()
    {
        return $this->_objPDO->lastInsertId();
    }

    public static function dameUnObjetoAcceso()
    {
        if (!isset(self::$_objAccesoDatos)) {
		    self::$_objAccesoDatos = new AccesoDatos();
		}

        return self::$_objAccesoDatos;
    }

    public function __clone()
    {
        trigger_error('La clonacion de este objeto no esta permitida',E_USER_ERROR);
    }
}
