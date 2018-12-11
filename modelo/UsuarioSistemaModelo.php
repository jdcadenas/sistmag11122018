<?php
include "usuario.php";

class UsuarioSistemaModelo
{

    private $id_usuario_sistema = "";
    private $usuario_sistema    = "";
    private $nombre             = "";
    private $apellido           = "";
    private $cedula             = "";
    private $clave              = "";
    private $id_rol             = "";   
    private $telefono_usuario   = "";
    private $email_usuario      = "";
    private $fecha_creado       = "";

    public function __construct()
    {
        $this->id_usuario_sistema = "";
        $this->usuario_sistema    = "";
        $this->nombre             = "";
        $this->apellido           = "";
        $this->cedula             = "";
        $this->clave              = "";
        $this->id_rol             = "";       
        $this->telefono_usuario   = "";
        $this->email_usuario      = "";
        $this->fecha_creado       = "";
    }

    public function logueo($_usuario, $_clave)
    {

        $consulta = "SELECT * FROM usuario_sistema WHERE usuario_sistema='$_usuario' AND clave='$_clave'";

        $sentencia = Database::tenerconex()->query($consulta);
        $resultado = $sentencia->fetch();
        if ($resultado == null) {
          header("Location: " . RUTA . "/?accion=index");
          exit;
      } else {
        $_SESSION["usulog"]     = "si";
        $_SESSION["id_usuario_sistema"] = $resultado["id_usuario_sistema"];
        $_SESSION["usuario_sistema"]     = $resultado["usuario_sistema"];
        $_SESSION["nombre"]     = $resultado["nombre"];
        $_SESSION["apellido"]   = $resultado["apellido"];
        $_SESSION["cedula"]      = $resultado["cedula"];
        $_SESSION["clave"]      = $resultado["clave"];
        $_SESSION["id_rol"]      = $resultado["id_rol"];
        $_SESSION["telefono_usuario"]      = $resultado["telefono_usuario"];
        $_SESSION["email_usuario"]      = $resultado["email_usuario"];
        $_SESSION["fecha_creado"]      = $resultado["fecha_creado"];
            //buscar el rol del usuario dado su id
        $consulta2        = "SELECT * FROM usuario_sistema u INNER JOIN rol r on u.id_rol=r.id_rol WHERE u.id_usuario_sistema='" . $_SESSION['id_usuario_sistema'] . "'";
        $sentencia2       = Database::tenerconex()->query($consulta2);
        $resultado2       = $sentencia2->fetch();
        $_SESSION["descripcion"] = $resultado2["descripcion"];

        header("Location: " . RUTA . "/?accion=principal");
        exit;

    }
}

public function salir()
{

    unset($_SESSION);
    session_destroy();

}

public function Obtener($id)
{
    try
    {
        $stm = Database::tenerconex()
        ->prepare("SELECT * FROM usuario_sistema WHERE id_usuario_sistema = ?");

        $stm->execute(array($id));
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $usu = new Usuario();

        $usu->__SET('id_usuario_sistema', $r->id_usuario_sistema);
        $usu->__SET('usuario_sistema', $r->usuario_sistema);
        $usu->__SET('clave', $r->clave);
        $usu->__SET('nombre', $r->nombre);
        $usu->__SET('apellido', $r->apellido);
        $usu->__SET('cedula', $r->cedula);
        $usu->__SET('id_rol', $r->id_rol);
        $usu->__SET('telefono_usuario', $r->telefono_usuario);
        $usu->__SET('email_usuario', $r->email_usuario);           
        $usu->__SET('fecha_creado', $r->fecha_creado);
        return $usu;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function Actualizar(usuario $data)
{
    try
    {
        $sql = "UPDATE usuario SET

        id_usuario_sistema        = ?,
        usuario_sistema      = ?,
        clave        = ?,
        nombre      = ?,
        apellido        = ?,
        cedula         = ?,
        id_rol       = ?,
        telefono_usuario        = ?,
        email_usuario        = ?,
        fecha_creado       = ?            

        WHERE id_usuario_sistema = ?";

        Database::tenerconex()->prepare($sql)
        ->execute(
            array(

                $data->__GET('id_usuario_sistema'),
                $data->__GET('usuario_sistema'),
                $data->__GET('clave'),
                $data->__GET('nombre'),
                $data->__GET('apellido'),
                $data->__GET('cedula'),
                $data->__GET('id_rol'),
                $data->__GET('telefono_usuario'),
                $data->__GET('email_usuario'),
                $data->__GET('fecha_creado')
                
            ) 
        );
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function Registrar(Usuario $data)
{

    try 
    {
        $sql = "INSERT INTO usuario_sistema (

        usuario_sistema,
        clave,
        nombre,
        apellido,
        cedula,
        id_rol,
        telefono_usuario,
        email_usuario,
        fecha_creado
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        Database::tenerconex()->prepare($sql)
        ->execute(
            array($data->__GET('usuario_sistema'),
                $data->__GET('clave'),
                $data->__GET('nombre'),
                $data->__GET('apellido'),
                $data->__GET('cedula'),
                $data->__GET('id_rol'),
                $data->__GET('telefono_usuario'),
                $data->__GET('email_usuario'),
                $data->__GET('fecha_creado'),

            ));  

    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function Listar()
{
    try
    {
        $result = array();

        $stm = Database::tenerconex()->prepare("SELECT *
            FROM usuario_sistema u inner join rol r on u.id_rol=r.id_rol");
        $stm->execute();

        foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
            $usu = new Usuario();

            $usu->__SET('id_usuario_sistema', $r->id_usuario_sistema);
            $usu->__SET('usuario_sistema', $r->usuario_sistema);
            $usu->__SET('clave', $r->clave);
            $usu->__SET('nombre', $r->nombre);
            $usu->__SET('apellido', $r->apellido);
            $usu->__SET('cedula', $r->cedula);
            $usu->__SET('id_rol', $r->id_rol);           
            $usu->__SET('telefono_usuario', $r->telefono_usuario);
            $usu->__SET('email_usuario' , $r->email_usuario);
            $usu->__SET('fecha_creado' , $r->fecha_creado);

            $result[] = $usu;
        }

        return $result;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
public function Eliminar($id)
{
    try
    {
        $stm = Database::tenerconex()
        ->prepare("DELETE FROM usuario_sistema WHERE id_usuario_sistema = ?");

        $stm->execute(array($id));
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function Buscar($id)
{
    try
    {
        $stm = Database::tenerconex()
        ->prepare("SELECT * FROM usuario_sistema WHERE cedula = ?");

        $stm->execute(array($id));
        $r = $stm->fetch(PDO::FETCH_OBJ);
        $cant=$stm->rowCount();
        return $cant;
        


    } catch (Exception $e) {
        die($e->getMessage());
    }
}   

public function BuscarNombreUsu($id)
{
    try
    {
        $stm = Database::tenerconex()
        ->prepare("SELECT * FROM usuario_sistema WHERE usuario_sistema = ?");

        $stm->execute(array($id));
        $r = $stm->fetch(PDO::FETCH_OBJ);
        $cant=$stm->rowCount();
        return $cant;
        


    } catch (Exception $e) {
        die($e->getMessage());
    }
}

}
