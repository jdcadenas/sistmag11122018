<?php

include("parroquia.php");

class ParroquiaModelo {

  public function Listar($municipio_id)
  {
    try
    {
        $result = array();

        $stm = Database::tenerconex()->prepare("SELECT * FROM parroquia  WHERE municipio_id = ?");
        $stm->execute(array($municipio_id));
        $html= "<option value='0'>Seleccionar Parroquia</option>";
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $pac = new Parroquia();

            $pac->__SET('id_parroquia', $r->id_parroquia);
            $pac->__SET('nombre', $r->nombre);
            $pac->__SET('municipio_id', $r->municipio_id);



            $result[] = $pac;
            $html.= "<option value='".$pac->id_parroquia."'>".$pac->nombre."</option>";
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

        $stm = Database::tenerconex()->prepare("SELECT * FROM parroquia");
        $stm->execute();
        
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $pac = new Parroquia();

            $pac->__SET('id_parroquia', $r->id_parroquia);
            $pac->__SET('nombre', $r->nombre);
            $pac->__SET('municipio_id', $r->municipio_id);



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
        ->prepare("SELECT * FROM parroquia WHERE id_parroquia = ?");


        $stm->execute(array($id));
        $html= "<option value='0'>Seleccionar parroquias</option>";
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $par = new Parroquia();

        $par->__SET('id_parroquia', $r->id_parroquia);
        $par->__SET('nombre', $r->nombre);
        $par->__SET('municipio_id', $r->municipio_id);

        return $par;


        
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
}


public function ObtenerMuni($id)
{
    try 
    {
        $stm = Database::tenerconex()
        ->prepare("SELECT *,p.nombre parr,m.nombre muni,e.nombre esta FROM parroquia p,municipio m, estado e WHERE p.id_parroquia = ? AND p.municipio_id=m.id_municipio AND m.estado_id=e.id_estado");


        $stm->execute(array($id));
        
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $parr = new Parroquia();

        $parr->__SET('id_parroquia', $r->id_parroquia);
        $parr->__SET('nombre', $r->nombre);
        $parr->__SET('municipio_id', $r->municipio_id);

        





        return $r;
        
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
}
}

