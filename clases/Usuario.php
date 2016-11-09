<?php
require_once "AccesoDatos.php";

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


    }

    public static function TraerTodosLosPerfiles() {
        //Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT `perfil` FROM `usuarios`");
        //Executo la consulta
        $consulta->execute();
        //Genero un array de los perfiles
        $perfiles = $consulta->fetchObjet('array');
        //retorno el array de perfiles
        return $perfiles;
    }

    public static function Borrar($id) {
		//IMPLEMENTAR...
    }
}
