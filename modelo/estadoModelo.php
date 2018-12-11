<?php



include("estado.php");

class EstadoModelo {

  public function Listar()
  {
    try
    {
        $result = array();

        $stm = Database::tenerconex()->prepare("SELECT * FROM estado");
        $stm->execute();

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $est = new Estado();

            $est->__SET('id_estado', $r->id_estado);
            $est->__SET('nombre', $r->nombre);
            $est->__SET('pais_id', $r->pais_id);
            
            

            $result[] = $est;
        }

        return $result;
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

        $stm = Database::tenerconex()->prepare("SELECT * FROM estado ");
        $stm->execute();
        
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
        {
            $pac = new Estado();

            $pac->__SET('id_estado', $r->id_estado);
            $pac->__SET('nombre', $r->nombre);
            $pac->__SET('pais_id', $r->pais_id);



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
        ->prepare("SELECT * FROM estado WHERE id_estado = ?");
        

        $stm->execute(array($id));
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $est = new Estado();

        $est->__SET('id_estado', $r->id_estado);
        $est->__SET('nombre', $r->nombre);
        $est->__SET('pais_id', $r->pais_id);
        
        
        

        return $est;
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
}

}


