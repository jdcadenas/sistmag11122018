<?php

include "paciente.php";

class PacienteModelo
{

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *,
                m.nombre as nom_municipio, 
                pa.nombre nom_parroquia, 
                e.nombre nom_estado
                FROM paciente p,
                parroquia pa,
                municipio m,
                estado e
                WHERE p.id_parroquia=pa.id_parroquia
                and pa.municipio_id=m.id_municipio
                and m.estado_id=e.id_estado
                order by id_paciente desc");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
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
                $pac->__SET('fecha_creado', $r->fecha_creado);
                $pac->__SET('estado', $r->nom_estado);
                $pac->__SET('municipio', $r->nom_municipio);
                $pac->__SET('parroquia', $r->nom_parroquia);
                $pac->__SET('embarazada', $r->embarazada);
                $pac->__SET('madre_lactante', $r->madre_lactante);
                $pac->__SET('lactante', $r->lactante);

                $result[] = $pac;
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
            ->prepare("SELECT * FROM paciente WHERE id_paciente = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

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
            $pac->__SET('fecha_creado', $r->fecha_creado);
            $pac->__SET('estado', $r->estado);
            $pac->__SET('municipio', $r->municipio);
            $pac->__SET('parroquia', $r->parroquia);
            $pac->__SET('embarazada', $r->embarazada);
            $pac->__SET('madre_lactante', $r->madre_lactante);
            $pac->__SET('lactante', $r->lactante);

            return $pac;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try
        {
            $stm = Database::tenerconex()
            ->prepare("DELETE FROM paciente WHERE id_paciente = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(paciente $data)
    {
        try
        {
            $sql = "UPDATE paciente SET

            numero_paciente        = ?,
            nombre_paciente      = ?,
            apellido_paciente        = ?,
            cedula_paciente      = ?,
            nacionalidad_paciente        = ?,
            fecha_nacimiento         = ?,
            direccion_paciente       = ?,
            sexo_paciente        = ?,
            telefono_paciente        = ?,
            etnia_paciente       = ?,
            id_parroquia         = ?,
            id_usuario_sistema       = ?,
            email_paciente       = ?,
            estadocivil_paciente         = ?,
            ocupacion = ?,
            peso_paciente =?,
            datosEstadoObj,
            datosMunicipioObj,
            datosParroquiaObj,
            embarazada =?,
            madre_lactante =?,
            lactante =?

            WHERE id_paciente = ?";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array(

                    $data->__GET('numero_paciente'),
                    $data->__GET('nombre_paciente'),
                    $data->__GET('apellido_paciente'),
                    $data->__GET('cedula_paciente'),
                    $data->__GET('nacionalidad_paciente'),
                    $data->__GET('fecha_nacimiento'),
                    $data->__GET('direccion_paciente'),
                    $data->__GET('sexo_paciente'),
                    $data->__GET('telefono_paciente'),
                    $data->__GET('etnia_paciente'),
                    $data->__GET('id_parroquia'),
                    $data->__GET('id_usuario_sistema'),
                    $data->__GET('email_paciente'),
                    $data->__GET('estadocivil_paciente'),
                    $data->__GET('ocupacion'),
                    $data->__GET('peso_paciente'),
                    $data->__GET('id_paciente'),
                    $data->__GET('datosEstadoObj'),
                    $data->__GET('datosMunicipioObj'),
                    $data->__GET('datosParroquiaObj'),
                    $data->__GET('embarazada'),
                    $data->__GET('madre_lactante'),
                    $data->__GET('lactante')
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Buscar($id)
    {
        try
        {
            $stm = Database::tenerconex()
            ->prepare("SELECT * FROM paciente WHERE cedula_paciente = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $cant=$stm->rowCount();
            return $cant;
            


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(paciente $data)
    {

        try
        {
            $sql = "INSERT INTO paciente (
            numero_paciente,
            nombre_paciente,
            apellido_paciente,
            cedula_paciente,
            nacionalidad_paciente,
            fecha_nacimiento,
            direccion_paciente,
            sexo_paciente,
            telefono_paciente,
            etnia_paciente,
            id_parroquia,
            id_usuario_sistema,
            email_paciente,
            estadocivil_paciente,
            ocupacion,
            peso_paciente,
            estado,
            municipio,
            parroquia,
            embarazada,
            madre_lactante,
            lactante
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            Database::tenerconex()->prepare($sql)
            ->execute(
                array($data->__GET('numero_paciente'),
                    $data->__GET('nombre_paciente'),
                    $data->__GET('apellido_paciente'),
                    $data->__GET('cedula_paciente'),
                    $data->__GET('nacionalidad_paciente'),
                    $data->__GET('fecha_nacimiento'),
                    $data->__GET('direccion_paciente'),
                    $data->__GET('sexo_paciente'),
                    $data->__GET('telefono_paciente'),
                    $data->__GET('etnia_paciente'),
                    $data->__GET('id_parroquia'),
                    $data->__GET('id_usuario_sistema'),
                    $data->__GET('email_paciente'),
                    $data->__GET('estadocivil_paciente'),
                    $data->__GET('ocupacion'),
                    $data->__GET('peso_paciente'),
                    $data->__GET('estado'),
                    $data->__GET('municipio'),
                    $data->__GET('parroquia'),
                    $data->__GET('embarazada'),
                    $data->__GET('madre_lactante'),
                    $data->__GET('lactante')

                ));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}


