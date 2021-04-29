<?php
include('Connexion.php');

$q = $pdo->query("select distinct * from candidat where id = " . $_GET['id'] . "");
//$q->execute(array($_GET['id']));
$res = $q->fetch();

//echo "show de " . $_GET['id'];
if (($_GET['id'] == "") || ($q->rowCount() == 0)) {
    header('Location: servicesconseils.php');
}

// fetch formation
$qf = $pdo->query("SELECT * FROM formation as f WHERE id=" . $_GET['id'] . "");
$formation = $qf->fetchAll(PDO::FETCH_ASSOC);

// fetch langue

$ql = $pdo->query("SELECT l.description ,p.id FROM parler as p, langue as l where l.id_langue = p.id_langue and p.id=" . $_GET['id'] . "  ORDER BY description ASC ");
$langue = $ql->fetchAll(PDO::FETCH_ASSOC);

// fetch logiciels

$qs =  $pdo->query("SELECT description, m.id FROM logiciel as l, maitrise as m where l.id_logiciel = m.id_logiciel and id=" . $_GET['id'] . "");
$logiciel = $qs->fetchAll(PDO::FETCH_ASSOC);

// fetch centre d'interer

$qci =  $pdo->query("SELECT * FROM `loisir` where id=" . $_GET['id'] . "");
$loisir = $qci->fetchAll(PDO::FETCH_ASSOC);

// fetch expérience
$set = $pdo->query("SET lc_time_names = 'fr_FR'");
$qexp =  $pdo->query("SELECT DATE_FORMAT(date_debut, '%M %Y') as `date_debut`, DATE_FORMAT(date_fin, '%M %Y') as `date_fin`,`nom_ent`,`secteur`,`poste`,`mission` FROM experience as e , candidat as c where e.id = c.id and c.id =" . $_GET['id'] . "");
$exp = $qexp->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cv N°<?= $_GET['id']; ?> </title>
    <link rel="stylesheet" href="./style/showCv.css">
</head>

<body>
    <div id="content">
        <div id="back"><a href="servicesconseils.php" id="backlink">
                Retour à la liste des CV</a>
        </div>
        <div id="main">
            <div id="cvheader">
                <div id="cvinfo">
                    <p><?php echo ucfirst($res['nom']) . " " . ucfirst($res['prenom']); ?></p>
                    <p>Adresse : <?php echo ucfirst($res['adresse']) ?></p>
                    <p>Tél : <?php echo $res['telephone'] ?></p>
                    <p>E-mail : <?php echo $res['email'] ?></p>
                    <p><?php echo $res['permis'] ? "Permis de conduire" : "" ?> </p>
                </div>
                <img src="./style/cvshow.png" alt="">
            </div>

        </div>

        <div id="exp">
            <h3>EXPERIENCES</h3>
            <br>

            <table>
                <?php
                foreach ($exp as $xp) {


                    echo '<tr>
                <td class="dateD">' . ucfirst($xp["date_debut"]) . '</td>
                <td class="mission" rowspan="2">' . $xp['nom_ent'] . ', ' . $xp['secteur'] . ', ' . $xp['poste'] . '<br>  Mission :<br>' . $xp['mission'] . '</td>
                </tr>
                <tr>
                    <td class="dateF">' . ucfirst($xp['date_fin']) . '</td>
                    <td></td>
                </tr>
                <tr></tr>';
                }
                ?>

            </table>
        </div>
        <div id="cursus">
            <h3>FORMATIONS</h3>
            <br>

            <table>
                <?php

                foreach ($formation as $f) {
                    echo '                <tr>
                    <td class="dateD">Diplôme</td>
                    <td class="mission">
                        ' . $f["diplome"] . '
                    </td>
                </tr>
                <tr>
                    <td class="dateF">Etablissement</td>
                    <td>' . $f["établissement"] . ' </td>
                </tr>
                <tr></tr>
                    ';
                }

                echo '
                <tr>
                <td class="dateD">Langue(s)</td>
                <td class="mission">
                ';
                foreach ($langue as $l) {


                    echo $l["description"] . ' ';
                }
                echo '</td>
                </tr>';


                echo '<tr>
                <td class="dateF">Logiciels maîtrisés</td>
                <td>';
                foreach ($logiciel as $s) {
                    echo $s["description"] . ' ';
                }
                echo '</td>
                </tr>';
                ?>


            </table>
        </div>

        <div id="centre">
            <h3>CENTRES D'INTERETS</h3>
            <br>
            <p>
                <?php

                foreach ($loisir as $ci) {
                    echo $ci['description'] . ' ';
                }

                ?>
            </p>
        </div>

    </div>
    <?php include('footer.php'); ?>
</body>

</html>