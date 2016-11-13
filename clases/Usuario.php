<?php
require_once 'AccesoDatos.php';

class Usuario {

    //--ATRIBUTOS
    public $id;
    public $nombre;
    public $email;
    public $password;
    public $perfil;
    public $foto;

    //--CONSTRUCTOR
    public function __construct($id = NULL) {
        if ($id !== NULL) {
            $this->id = $id;
        }
    }

    //--METODOS DE CLASE
    public static function TraerUsuarioLogueado($obj) {
		return $this->TraerUnUsuarioPorId($ob->id);
    }

    public static function TraerUnUsuarioPorId($id) {
		//Instancio un objeto a acceso de datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM `usuarios` WHERE `id`= $id");
        //Ejecuto la consulta
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");
    }

    public static function Agregar($obj) {
		//Intancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into usuarios (nombre, email, password, perfil, foto)
                                                            values('$obj->nombre','$obj->email','$obj->password','$obj->perfil',$obj->foto)");
        //Ejecuto la consulta
        $consulta->execute();
        var_dump($consulta);
        return $objetoAccesoDatos->RetornarUltimoIdInsertado();
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("UPDATE usuarios
                                                            set nombre=:nombre,
                                                                email=:email,
                                                                password=:password,
                                                                perfil=:perfil,
                                                                foto=:foto
                                                            WHERE id=:id");
        //Vinculo un valor a los parametros de sustitucion :nombre, :email, :password, :perfil, :foto
        $consulta->bindValue(':id', $obj->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $obj->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':email',$obj->email, PDO::PARAM_STR);
        $consulta->bindValue(':password', $obj->password, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $obj->perfil, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $obj->foto, PDO::PARAM_STR);
        //Ejecuto la consulta y retorno
        return $consulta->execute();
    }

    public static function TraerTodosLosUsuarios() {
        //Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM `usuarios`");
        //Ejecuto la consulta
        $consulta->execute();
        //Casteo los usuario a una variable y la retorno
        $usuarios = $consulta->fetchAll(PDO::FETCH_CLASS,"Usuario");
        return $usuarios;
    }

    public static function TraerTodosLosPerfiles() {
        //Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consultao
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT DISTINCT `perfil` FROM `usuarios`");
        //Ejecuto la consulta
        $consulta->execute();
        //Genero un array stdClass de los perfiles
        $perfiles = $consulta->fetchAll(PDO::FETCH_OBJ); //CONSULTA
        //retorno los perfiles
        return $perfiles;
    }

    public static function Borrar($id) {
        //Instancio un objeto a acceso a datos
        $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();
        //Genero la consulta
        $consulta = $objetoAccesoDatos->RetornarConsulta("DELETE FROM usuarios WHERE id=:id");
        //Vinculo un valor al parametro de sustitucion :id
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        //Ejecuto la consulta
        $consulta->execute();
        //Devolvemos el numero de filas afectadas por la consulta
        return $consulta->rowCount();

    }


}
