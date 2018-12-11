<?php

include "caso.php";

class CasoModelo
{

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT * FROM caso");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $cas = new Caso();

                $cas->__SET('id_caso', $r->id_caso);
                $cas->__SET('numero_caso', $r->numero_caso);                
                $cas->__SET('muerte', $r->muerte);
                $cas->__SET('recaida', $r->recaida);
                
                $cas->__SET('clasificacion_caso', $r->clasificacion_caso);
                $cas->__SET('direccion', $r->direccion);
                $cas->__SET('estado', $r->estado);
                $cas->__SET('municipio', $r->municipio);
                $cas->__SET('parroquia', $r->parroquia);

                $result[] = $cas;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try
        {
            $stm = Database::tenerconex()
            ->prepare("SELECT * FROM paciente pa, paciente_caso pc, caso ca 
                WHERE pa.id_paciente = pc.id_paciente AND 
                ca.id_caso = pc.id_caso AND pa.id_paciente = 
                ?");

            $res=$stm->execute(array($id));

            if ($data = $stm->fetchAll(PDO::FETCH_OBJ)) {

             $html= "<table class='table'> 
             <tr>
             <th>Número de Caso:</th>
             <th>Recaídas</th>
             <th>Clasificación del Caso</th>
             <th>Dirección</th>
             <th>Estado</th>
             <th>Municipio</th>
             <th>Parroquia</th>
             </tr>";

             foreach($data as $r)

             {

                $cas = new Caso();

                $cas->__SET('id_caso', $r->id_caso);
                $cas->__SET('numero_caso', $r->numero_caso);            
                $cas->__SET('muerte', $r->muerte);
                $cas->__SET('recaida', $r->recaida);
                
                $cas->__SET('clasificacion_caso', $r->clasificacion_caso);
                $cas->__SET('direccion', $r->direccion);
                $cas->__SET('estado', $r->estado);
                $cas->__SET('municipio', $r->municipio);
                $cas->__SET('parroquia', $r->parroquia);


                $html.= "<tr>
                <td>".$r->numero_caso."</td>
                <td>".$r->recaida."</td>
                <td>".$r->clasificacion_caso."</td>                 
                <td>".$r->direccion."</td>
                <td>".$r->estado."</td>
                <td>".$r->municipio."</td>
                <td>".$r->parroquia."</td>
                </tr>";

            }
            $html.="</table>";
        }else{
            $html="No hay datos que mostrar";
        }


        return $html;  
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function Registrar (Caso $data,$id_paciente)
{
    try
    {
        $sql= "INSERT INTO caso (        
        numero_caso,
        muerte,
        recaida,        
        clasificacion_caso,
        direccion,
        estado,
        municipio,
        parroquia           
        )

        VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        Database::tenerconex()->prepare($sql)
        ->execute(
            array(                
                $data->__GET('numero_caso'),
                $data->__GET('muerte'),
                $data->__GET('recaida'),                
                $data->__GET('clasificacion_caso'),
                $data->__GET('direccion'),
                $data->__GET('estado'),
                $data->__GET('municipio'),
                $data->__GET('parroquia')

            ));

        $ultimo=Database::tenerconex()->lastInsertId();


        $sql = "INSERT INTO paciente_caso (        
        id_caso,
        id_paciente

        )
        VALUES (?, ? )";

        Database::tenerconex()->prepare($sql)
        ->execute(
            array(                
                $ultimo,
                $id_paciente )

        );

    }catch (Exception $e) {
        die($e->getMessage());
    }
}

}


