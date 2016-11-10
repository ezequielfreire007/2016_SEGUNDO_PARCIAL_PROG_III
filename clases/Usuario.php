<?php
require_once 'AccesoDatos.php';

class Usuario {

    //Atributos
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $perfil;
    private $foto;

    //--CONSTRUCTOR
    public function __construct($id = NULL) {
        if ($id !== NULL) {
            $this->id = $id;
        }
    }

    public static function TraerUsuarioLogueado($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerUnUsuarioPorId($id) {
		//IMPLEMENTAR...
    }

    public static function Agregar($obj) {
		//IMPLEMENTAR...
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerTodosLosUsuarios() {
        //Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM `usuarios` WHERE 1");
        //Executo la consulta
        $consulta->execute();
        //Casteo los usuario a una variable y la retorno
        $usuarios = $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");
        return $usuarios;
    }

    public static function TraerTodosLosPerfiles() {
        //Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consultao
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT `perfil` FROM `usuarios`");
        //Executo la consulta
        $consulta->execute();
        //Genero un array de los perfiles
        $perfiles = $consulta->fetchAll(PDO::FETCH_OBJ); //CONSULTA
        //retono los primeros 3 perfiles
        $retorno = array();
        for ($i=0; $i < 3; $i++) {
            $retorno[$i] = $perfiles[$i]->perfil;
        }
        //var_dump($retorno);
        //retorno el array de perfiles
        return $retorno;
    }

    public static function Borrar($id) {
		//IMPLEMENTAR...
    }


}
