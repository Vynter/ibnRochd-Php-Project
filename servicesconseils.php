<?php
include('Connexion.php');



$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$where = " WHERE e.id=c.id and f.id=c.id  ";


$q = $pdo->query("SELECT DISTINCT c.id ,c.prenom as prenom,c.nom as nom ,c.adresse as adresse,c.email as email ,c.telephone as telephone
FROM candidat as c , formation as f , experience as e ");



$resultat = $q->fetchAll(PDO::FETCH_ASSOC);



if (isset($_GET['email']) || isset($_GET['poste']) || isset($_GET['diplome']) || isset($_GET['nom']) || isset($_GET['prenom'])) {

    if ($_GET['nom'] !== '') {
        $where .= " and c.nom like '%" . $_GET['nom'] . "%' ";
    }
    if ($_GET['prenom'] !== '') {
        $where .= " and c.prenom like '%" . $_GET['prenom'] . "%' ";
    }

    if ($_GET['email'] !== '') {
        $where .= " and c.email like '%" . $_GET['email'] . "%' ";
    }
    if ($_GET['poste'] !== '') {
        $where .= " and e.poste like '%" . $_GET['poste'] . "%' ";
    }
    if ($_GET['diplome'] !== '') {
        $where .= " and f.diplome like '%" . $_GET['diplome'] . "%' ";
    }

    $q = $pdo->query("SELECT DISTINCT c.id ,c.prenom as prenom,c.nom as nom ,c.adresse as adresse,c.email as email ,c.telephone as telephone
    FROM candidat as c,formation as f,experience as e $where  ");


    $resultat = $q->fetchAll(PDO::FETCH_ASSOC);
}

$url = "showprofile.php";
$urlEdit = "editprofile.php";
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>IT Dev</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
    <div id="main">
        <div id="header">

            <?php include('header.php'); ?>
        </div>

        <div id="site_content">

            <div id="main">
                <!-- insérez le contenu de la page ici -->
                <h1>Liste des CV</h1>
                <div class="entete">
                    <fieldset>
                        <legend>Recherche des curriculum vitae</legend>
                        <form action="" method="get" id="recherchecv">
                            <table>
                                <thead>
                                    <th>Nom :</th>
                                    <th>Prénom :</th>
                                    <th>Email :</th>
                                    <th>Poste :</th>
                                    <th>Diplôme :</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="searchinp" type="text" name="nom" placeholder="Nom.."></td>
                                        <td><input class="searchinp" type="text" name="prenom" placeholder="Prénom..">
                                        </td>
                                        <td><input class="searchinp" type="email" name="email" placeholder="Email..">
                                        </td>
                                        <td><input class="searchinp" type="text" name="poste" placeholder="Poste..">
                                        </td>
                                        <td><input class="searchinp" type="text" name="diplome" placeholder="Diplôme..">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button id="sbmt" type="submit">Recherche</button></td>
                                    </tr>
                                </tbody>

                            </table>

                        </form>

                    </fieldset>
                </div>
                <div class="mainAff">
                    <table cellspacing="0" cellpadding="0">
                        <thead id="thAff">
                            <tr>
                                <th>Nom et prénom</th>
                                <th>Adresse</th>
                                <th>Téléphonne</th>
                                <th>Email</th>
                                <th>Consulter</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($resultat as $value) {

                                if ($i % 2 === 0) {
                                    echo '
                                <tr class="foncé">
                                <td><a href="' . $urlEdit . '?id=' . $value["id"] . '">' . $value['nom'] . ' ' . $value['prenom']  . '</a></td>
                                <th>' . $value['adresse'] . '</th>
                                <th>' . $value['telephone'] . '</th>
                                <th>' . $value['email'] . '</th>
                                <th><a href="' . $url . '?id=' . $value["id"] . '"><img src="style/vue.png"></a></th>
                                <tr>
                                ';
                                } else {
                                    echo '
                                    <tr class="claire">
                                    <td><a href="' . $urlEdit . '?id=' . $value["id"] . '">' . $value['nom'] . ' ' . $value['prenom']  . '</a></td>
                                    <th>' . $value['adresse'] . '</th>
                                    <th>' . $value['telephone'] . '</th>
                                    <th>' . $value['email'] . '</th>
                                    <th><a href="' . $url . '?id=' . $value["id"] . '"><img src="style/vue.png"></a></th>
                                    <tr>
                                    ';
                                }
                                $i++;
                            }
                            ?>


                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        <?php include('footer.php'); ?>

    </div>
</body>

</html>