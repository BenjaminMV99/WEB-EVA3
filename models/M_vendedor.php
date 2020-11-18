<?php 

namespace models;

require_once("Conexion.php");

class M_vendedor
{

    public function vendedor_login($rut, $clave)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B AND estado=1");
        $stm->bindParam(":A", $rut);
        $stm->bindParam(":B", md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function insertCliente($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO cliente VALUES(:A, :B, :C, :D, :E, :F)");
        $stm->bindParam(":A",$data['rut_cliente']);
        $stm->bindParam(":B",$data['nombre_cliente']);
        $stm->bindParam(":C",$data['direccion_cliente']);
        $stm->bindParam(":D",$data['telefono_cliente']);
        $stm->bindParam(":E",$data['fecha_creacion']);
        $stm->bindParam(":F",$data['email_cliente']);
        return $stm->execute();
    }

    public function getAllUsuarios()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


}