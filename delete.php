<?php include("Connexion.php");

if (isset($_POST) && count($_POST) > 0) {


    $q = $pdo->query("select distinct * from candidat where id = " . $_GET['id'] . "");
    //$q->execute(array($_GET['id']));
    $res = $q->fetch();

    if (($_GET['id'] == "") || ($q->rowCount() == 0)) {
        header('Location: servicesconseils.php');
    }
}