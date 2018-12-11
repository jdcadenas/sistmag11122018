<?php

include "reporte.php";
include "paciente.php";
include "prueba.php";
include "estado.php";
include "municipio.php";
include "parroquia.php";

class ReporteModelo
{

    public function Listar($fecha)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *, pa.nombre as nombreparroquia, mu.nombre as nombremunicipio, es.nombre as nombreestado FROM paciente p 
                INNER JOIN paciente_pruebas pp ON p.id_paciente=pp.id_paciente
                INNER JOIN pruebas pr on pr.id_pruebas=pp.id_pruebas
                INNER JOIN parroquia pa ON pr.parroquia_id=pa.id_parroquia
                INNER JOIN municipio mu ON pa.municipio_id=mu.id_municipio
                INNER JOIN estado es ON mu.estado_id=es.id_estado                
                WHERE pr.fecha_toma_lamina= "."'$fecha'");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {



                $result[] = $r;

            }

            return $result;


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTratamientoDiario($fecha)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *  FROM paciente p 
                INNER JOIN paciente_tratamiento pt ON p.id_paciente=pt.id_paciente
                INNER JOIN tratamiento tr on pt.id_tratamiento=tr.id_tratamiento
                WHERE tr.fecha_suministrado= "."'$fecha'");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {



                $result[] = $r;

            }

            return $result;


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*WHERE p.fecha_creado= /*"."'$fecha' */


    public function Listarfechas($fechaini,$fechafin)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *, pa.nombre as nombreparroquia, mu.nombre as nombremunicipio, es.nombre as nombreestado FROM paciente p 
                INNER JOIN paciente_pruebas pp ON p.id_paciente=pp.id_paciente
                INNER JOIN pruebas pr on pr.id_pruebas=pp.id_pruebas
                INNER JOIN parroquia pa ON pr.parroquia_id=pa.id_parroquia
                INNER JOIN municipio mu ON pa.municipio_id=mu.id_municipio
                INNER JOIN estado es ON mu.estado_id=es.id_estado
                WHERE pr.fecha_toma_lamina between "." '$fechaini' and '$fechafin'");



            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {



                $result[] = $r;

            }

            return $result;


        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function ListarTratamientofechas($fechasinitra,$fechasfintra)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *  FROM paciente p 
                INNER JOIN paciente_tratamiento pt ON p.id_paciente=pt.id_paciente
                INNER JOIN tratamiento tr on pt.id_tratamiento=tr.id_tratamiento
                
                WHERE  tr.fecha_suministrado between "." '$fechasinitra' and '$fechasfintra'");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {

                $result[] = $r;
            }

            return $result;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarPruebaMes($mesini1,$mesini1)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *, pa.nombre as nombreparroquia, mu.nombre as nombremunicipio, es.nombre as nombreestado FROM paciente p 
                INNER JOIN paciente_pruebas pp ON p.id_paciente=pp.id_paciente
                INNER JOIN pruebas pr on pr.id_pruebas=pp.id_pruebas
                INNER JOIN parroquia pa ON pr.parroquia_id=pa.id_parroquia
                INNER JOIN municipio mu ON pa.municipio_id=mu.id_municipio
                INNER JOIN estado es ON mu.estado_id=es.id_estado
                WHERE  pr.fecha_toma_lamina between "."'$mesini1' and '$mesini1'");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {
                $result[] = $r;

            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTratamientoMes($mesinitra,$mesfintra)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT *  FROM paciente p 
                INNER JOIN paciente_tratamiento pt ON p.id_paciente=pt.id_paciente
                INNER JOIN tratamiento tr on pt.id_tratamiento=tr.id_tratamiento
                
                WHERE  tr.fecha_suministrado between "."'$mesinitra' and '$mesfintra'");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {

                $result[] = $r;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarReporteEstado()
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT COALESCE (ca.estado, LEFT('TOTAL', 40)) as estado ,COALESCE (pr.especie_plasmodium, RIGHT('TOTAL POR ESTADO>>>>', 40)) as Especie_Plasmodium, count(*) as total  FROM paciente p 
                INNER JOIN paciente_caso pc ON p.id_paciente=pc.id_paciente
                INNER JOIN caso ca on pc.id_caso=ca.id_caso
                INNER JOIN paciente_pruebas pp on p.id_paciente= pp.id_paciente
                INNER JOIN pruebas pr on pp.id_pruebas=pr.id_pruebas

                group by ROLLUP (ca.estado, pr.especie_plasmodium) 
                ");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {
                $result[] = $r;

            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTratamientoSuministrado($fecha)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT COALESCE (tr.nombre, LEFT('TOTAL', 40)) as medicina , sum (tr.cantidad) as total,tr.fecha_suministrado as fecha 


              FROM tratamiento tr 
              WHERE  tr.fecha_suministrado = '$fecha'

              group by ROLLUP (tr.nombre, tr.fecha_suministrado)
              ");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {
                $result[] = $r;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTratamientoSuministradoSemanal($busquedaseminisumi,$busquedasemfinsumi)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT COALESCE (tr.nombre, LEFT('TOTAL', 40)) as medicina , sum (tr.cantidad) as total,  (tr.fecha_suministrado, ('TOTAL')) as fecha  FROM tratamiento tr 
                WHERE  tr.fecha_suministrado between '$busquedaseminisumi' and '$busquedasemfinsumi'

                group by ROLLUP (tr.nombre, tr.fecha_suministrado)
                ");

            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {
                $result[] = $r;

            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarTratamientoSuministradoMensual($busquedamesinisumi,$busquedamesfinsumi)
    {
        try
        {
            $result = array();

            $stm = Database::tenerconex()->prepare("SELECT COALESCE (tr.nombre, LEFT('TOTAL', 40)) as medicina , sum (tr.cantidad) as total,  (tr.fecha_suministrado, ('TOTAL')) as fecha  FROM tratamiento tr 
              WHERE  tr.fecha_suministrado between '$busquedamesinisumi' and '$busquedamesfinsumi'

              group by ROLLUP (tr.nombre, tr.fecha_suministrado)
              ");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $r) {
                $result[] = $r;

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

    

    
}
