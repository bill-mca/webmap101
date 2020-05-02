<?php
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id=$_POST['id'];
    } else {
        $id="-99999";
    }

    $db = new PDO('pgsql:host=localhost;port=5432;dbname=webmap101;', 'joe', '12345');
    $sql = $db->query("SELECT id, name, web, image, category, ST_X(geom) as longitude, ST_Y(geom) as latitude FROM cdmx_attractions WHERE id={$id}");
    if ($sql) {
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
    } else {
        echo var_dump($sql->errorInfo());
    };

?>