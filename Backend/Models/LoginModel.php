<?php

class LoginModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(string $usuario): array
    {
        // Busca por nombre de usuario O correo electrónico
        $sql = "SELECT u.num_documento, u.nom_usuario, u.correo_electronico, u.contraseña,
                       r.nombre_rol, pr.estado
                FROM parkingsoft.usuario u
                INNER JOIN parkingsoft.persona_rol pr ON u.num_documento = pr.pk_fk_num_documento
                INNER JOIN parkingsoft.rol r ON pr.pk_fk_id_rol = r.id_rol
                WHERE (u.nom_usuario = '$usuario' OR u.correo_electronico = '$usuario')
                AND pr.estado = 1
                LIMIT 1";
        $result = $this->select($sql);
        return $result;
    }
}
?>

