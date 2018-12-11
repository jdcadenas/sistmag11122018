<?php


include "tratamiento.php";

class TratamientoModelo
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
            ->prepare("SELECT * FROM 
                paciente pa, 
                paciente_tratamiento pt, 
                tratamiento tr
                WHERE 
                pa.id_paciente = pt.id_paciente AND
                tr.id_tratamiento = pt.id_tratamiento AND pa.id_paciente= ?");

            $res=$stm->execute(array($id));

            if ($data = $stm->fetchAll(PDO::FETCH_OBJ)) {



                $html= "<table class='table'> 
                <tr><th>Medicamento Suministrado</th>
                <th>Cant. Suministrada</th>
                <th>Fecha Suministrado</th>
                </tr>";

                foreach($data as $r)

                {



                    $tra = new Tratamiento();

                    $tra->__SET('id_tratamiento', $r->id_tratamiento);
                    $tra->__SET('nombre', $r->nombre);
                    $tra->__SET('cantidad', $r->cantidad);
                    $tra->__SET('fecha_suministrado', $r->fecha_suministrado);


                    $html.= "<tr><td>'".$tra->nombre."'</td>
                    <td>".$tra->cantidad."</td>
                    <td>'".$tra->fecha_suministrado."'</td>

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
            ->prepare("DELETE FROM tratamiento WHERE id_tratamiento = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Tratamiento $data)
    {
        try
        {
            $sql = "UPDATE tratamiento SET

            nombre        = ?,
            cantidad      = ?,
            fecha_suministrado        = ?


            WHERE id_tratamiento = ?";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array(
                    $data->__GET('nombre'),
                    $data->__GET('cantidad'),
                    $data->__GET('fecha_suministrado')                   
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Tratamiento $data) 
    {

        try
        {
            $sql = "INSERT INTO tratamiento (
            nombre,
            cantidad,
            fecha_suministrado


            )
            VALUES (?, ?, ?)";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array(
                    $data->__GET('nombre'),
                    $data->__GET('cantidad'),
                    $data->__GET('fecha_suministrado')
                    
                ));


            $ultimo=Database::tenerconex()->lastInsertId();


            $sql = "INSERT INTO paciente_tratamiento (
            id_paciente,
            id_tratamiento
            
            )
            VALUES (?, ?)";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array(
                    $data->__GET('id_paciente'),
                    $ultimo )

            );





        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTratamiento($id)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT
                *
                FROM
                paciente p
                INNER JOIN paciente_tratamiento pt ON pt.id_paciente = p.id_paciente
                INNER JOIN tratamiento t ON pt.id_tratamiento = t.id_tratamiento
                WHERE
                p.id_paciente = ?");
            $stm->execute(array($estado_id));
            $html= "<table >";
            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $pac = new Paciente();

                $pac->__SET('id_paciente', $r->id_paciente);
                $pac->__SET('numero_paciente', $r->numero_paciente);
                $pac->__SET('nombre_paciente', $r->nombre_paciente);
                $pac->__SET('apellido_paciente', $r->apellido_paciente);
                $pac->__SET('cedula_paciente', $r->cedula_paciente);
                $pac->__SET('nacionalidad_paciente', $r->nacionalidad_paciente);
                $pac->__SET('fecha_nacimiento', $r->fecha_nacimiento);
                $pac->__SET('direccion_paciente', $r->direccion_paciente);
                $pac->__SET('sexo_paciente', $r->sexo_paciente);
                $pac->__SET('telefono_paciente', $r->telefono_paciente);
                $pac->__SET('etnia_paciente', $r->etnia_paciente);

                $pac->__SET('id_parroquia', $r->id_parroquia);

                $pac->__SET('id_usuario_sistema', $r->id_usuario_sistema);
                $pac->__SET('email_paciente', $r->email_paciente);
                $pac->__SET('estadocivil_paciente', $r->estadocivil_paciente);
                $pac->__SET('peso_paciente', $r->peso_paciente);
                $pac->__SET('ocupacion', $r->ocupacion);

                $tra = new Tratamiento();

                $tra->__SET('nombre', $r->nombre);
                $tra->__SET('cantidad', $r->cantidad);
                $tra->__SET('fecha_suministrado', $r->fecha_suministrado);


                $result[] = $pac;
                $html.= "<tr><td>".$pac->nombre_paciente."</td><td>".$pac->apellido_paciente."</td>";
                $html.= "<tr><td>".$pac->cedula_paciente."</td><td>".$pac->id_parroquia."</td>";
                $html.= "<tr><td>".$tra->nombre."</td><td>".$tra->cantidad."</td>";
            }

            return $html;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }    

}

