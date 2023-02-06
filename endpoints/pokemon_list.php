<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //Add settings of the DB
    include('../connection/bbdd_properties.php');

    //Consultar si coinciden con la base de datos. Encript las password
    $query = "SELECT * FROM pokemon_list";

    $r = mysqli_query($conn, $query);

    $response = array();

    //Ahora almacenamos el array (registros posibles) y lo ejecutamos
    while ($res = mysqli_fetch_array($r)) {
        $response[] = array(
            "name" => $res["name"],
            "url" => $res["url"],
        );
    }

    echo json_encode(array("list" => $response));

}

?>