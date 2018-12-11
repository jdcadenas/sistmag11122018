<?php

include "prueba.php";

class PruebaModelo
{

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *
                FROM 
                public.paciente pa, 
                public.paciente_pruebas pp, 
                public.pruebas pr
                WHERE 
                pa.id_paciente = pp.id_paciente AND
                pr.id_pruebas = pp.id_pruebas");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $pru = new Prueba();

                $pru->__SET('id_pruebas', $r->id_pruebas);
                $pru->__SET('tipo_prueba', $r->tipo_prueba);
                $pru->__SET('codigo_notificacion', $r->codigo_notificacion);
                $pru->__SET('numero_lamina_pdrm', $r->numero_lamina_pdrm);
                $pru->__SET('tipo_busqueda', $r->tipo_busqueda);
                $pru->__SET('especie_plasmodium', $r->especie_plasmodium);
                $pru->__SET('fecha_inicio_fiebre', $r->fecha_inicio_fiebre);
                $pru->__SET('fecha_toma_lamina', $r->fecha_toma_lamina);
                $pru->__SET('lugar_toma_lamina', $r->lugar_toma_lamina);


                $result[] = $pru;
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
            ->prepare("SELECT *
                FROM 
                paciente pa, 
                paciente_pruebas pp, 
                pruebas pr
                WHERE 
                pa.id_paciente = pp.id_paciente AND
                pr.id_pruebas = pp.id_pruebas AND 
                pa.id_paciente = ?");

            $res=$stm->execute(array($id));

            if ($data = $stm->fetchAll(PDO::FETCH_OBJ)) {

                $html= "<table class='table'> 
                <tr><th>Tipo Prueba</th><th>Cod Notif.</th>
                <th>N° Lámina</th>
                <th>Tipo Busq.</th>
                <th>Especie Plasmodium</th>
                <th>F. Inicio Fiebre</th>
                <th>F. Toma Lámina</th>
                <th>Lugar Toma</th></tr>";
                
                foreach($data as $r)
                {        
                    $pru = new Prueba();

                    $pru->__SET('id_pruebas', $r->id_pruebas);
                    $pru->__SET('tipo_prueba', $r->tipo_prueba);
                    $pru->__SET('codigo_notificacion', $r->codigo_notificacion);
                    $pru->__SET('numero_lamina_pdrm', $r->numero_lamina_pdrm);
                    $pru->__SET('tipo_busqueda', $r->tipo_busqueda);
                    $pru->__SET('especie_plasmodium', $r->especie_plasmodium);
                    $pru->__SET('fecha_inicio_fiebre', $r->fecha_inicio_fiebre);
                    $pru->__SET('fecha_toma_lamina', $r->fecha_toma_lamina);
                    $pru->__SET('lugar_toma_lamina', $r->lugar_toma_lamina);


                    $html.= "<tr><td>'".$pru->tipo_prueba."'</td>
                    <td>".$pru->codigo_notificacion."</td>
                    <td>'".$pru->numero_lamina_pdrm."'</td>
                    <td>".$pru->tipo_busqueda."</td>
                    <td>'".$pru->especie_plasmodium."'</td>
                    <td>".$pru->fecha_inicio_fiebre."</td>                
                    <td>".$pru->fecha_toma_lamina."</td>                
                    <td>".$pru->lugar_toma_lamina."</td>
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

    public function Eliminar($id)
    {
        try
        {
            $stm = Database::tenerconex()
            ->prepare("DELETE FROM pruebas WHERE id_pruebas = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(pruebas $data)
    {
        try
        {
            $sql = "UPDATE pruebas SET

            tipo_prueba        = ?,
            codigo_notificacion      = ?,
            numero_lamina_pdrm        = ?,
            tipo_busqueda      = ?,
            especie_plasmodium        = ?,
            fecha_inicio_fiebre         = ?,
            fecha_toma_lamina       = ?,
            lugar_toma_lamina        = ?

            WHERE id_pruebas = ?";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array(
                    $data->__GET('tipo_prueba'),
                    $data->__GET('codigo_notificacion'),
                    $data->__GET('numero_lamina_pdrm'),
                    $data->__GET('tipo_busqueda'),
                    $data->__GET('especie_plasmodium'),
                    $data->__GET('fecha_inicio_fiebre'),
                    $data->__GET('fecha_toma_lamina'),
                    $data->__GET('lugar_toma_lamina'),
                    $data->__GET('id_pruebas')
                )
            );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Prueba $data)
    {

        try
        {
            $sql = "INSERT INTO pruebas (
            tipo_prueba,
            codigo_notificacion,
            numero_lamina_pdrm,
            tipo_busqueda,
            especie_plasmodium,
            fecha_inicio_fiebre,
            fecha_toma_lamina,
            lugar_toma_lamina,
            parroquia_id
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array(
                    $data->__GET('tipo_prueba'),
                    $data->__GET('codigo_notificacion'),
                    $data->__GET('numero_lamina_pdrm'),
                    $data->__GET('tipo_busqueda'),
                    $data->__GET('especie_plasmodium'),
                    $data->__GET('fecha_inicio_fiebre'),
                    $data->__GET('fecha_toma_lamina'),
                    $data->__GET('lugar_toma_lamina'),
                    $data->__GET('parroquia_id')
                ));


            $ultimo=Database::tenerconex()->lastInsertId();


            $sql = "INSERT INTO paciente_pruebas (
            id_paciente,
            id_pruebas
            
            )
            VALUES (?, ?)";

             return Database::tenerconex()->prepare($sql)
            ->execute(
                array(
                    $data->__GET('id_paciente'),
                    $ultimo )

            );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

