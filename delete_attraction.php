<?php
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id=$_POST['id'];
    } else {
        $id="-9999";
    }

    $db = new PDO('pgsql:host=localhost;port=5432;dbname=webmap101;', 'joe', '12345');
    $sql = $db->prepare("DELETE FROM cdmx_attractions WHERE id=:id");
    $params = ["id"=>$id];
    if ($sql->execute($params)) {
        echo "Attraction succesfully deleted";
    } else {
        echo var_dump($sql->errorInfo());
    };

?>