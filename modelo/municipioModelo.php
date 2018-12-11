<?php



include("municipio.php");

class MunicipioModelo {

  public function Listar($estado_id)
  {
    try
    {
        $result = array();

        $stm = Database::tenerconex()->prepare("SELECT * FROM municipio  WHERE estado_id = ?");
        $stm->execute(array($estado_id));
        $html= "<option value='0'>Seleccionar Municipio</option>";
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $mun = new Municipio();

            $mun->__SET('id_municipio', $r->id_municipio);
            $mun->__SET('nombre', $r->nombre);
            $mun->__SET('estado_id', $r->estado_id);



            $result[] = $mun;
            $html.= "<option value='".$mun->id_municipio."'>".$mun->nombre."</option>";
        }

        return $html;
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}

public function ListarPorNombre($estado)
  {
    try
    {
        $result = array();

        $stm = Database::tenerconex()->prepare("SELECT * FROM municipio  WHERE estado_id = ?");
        $stm->execute(array($estado_id));
        $html= "<option value='0'>Seleccionar Municipio</option>";
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $mun = new Municipio();

            $mun->__SET('id_municipio', $r->id_municipio);
            $mun->__SET('nombre', $r->nombre);
            $mun->__SET('estado_id', $r->estado_id);



            $result[] = $mun;
            $html.= "<option value='".$mun->id_municipio."'>".$mun->nombre."</option>";
        }

        return $html;
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}

public function ListarTodas()
{
    try
    {
        $result = array();

        $stm = Database::tenerconex()->prepare("SELECT * FROM municipio ");
        $stm->execute();
        
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $pac = new Municipio();

            $pac->__SET('id_municipio', $r->id_municipio);
            $pac->__SET('nombre', $r->nombre);
            $pac->__SET('estado_id', $r->estado_id);



            $result[] = $pac;
            
        }

        return $result;
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}


public function Obtener($id)
{
    try 
    {
        $stm = Database::tenerconex()
        ->prepare("SELECT * FROM municipio WHERE id_municipio = ?");


        $stm->execute(array($id));
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $mun = new Municipio();

        $mun->__SET('id_municipio', $r->id_municipio);
        $mun->__SET('nombre', $r->nombre);
        $mun->__SET('estado_id', $r->estado_id);




        return $mun;
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
}

public function ObtenerEsta($id)
{
    try 
    {
        $stm = Database::tenerconex()
        ->prepare("SELECT * FROM municipio WHERE id_municipio = ?");


        $stm->execute(array($id));
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $mun = new Municipio();

        $mun->__SET('id_municipio', $r->id_municipio);
        $mun->__SET('nombre', $r->nombre);
         $mun->__SET('estado_id', $r->estado_id);




        return $mun;
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
}


}


