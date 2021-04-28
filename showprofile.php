<?php
include('Connexion.php');

$q = $pdo->query("select distinct * from candidat where id = " . $_GET['id'] . "");
//$q->execute(array($_GET['id']));
$res = $q->fetch();

//echo "show de " . $_GET['id'];
if (($_GET['id'] == "") || ($q->rowCount() == 0)) {
    header('Location: servicesconseils.php');
}
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
                    <p><?php echo $res['nom'] . " " . $res['prenom']; ?></p>
                    <p>Adresse : <?php echo $res['adresse'] ?></p>
                    <p>Tél : <?php echo $res['telephone'] ?></p>
                    <p>E-mail : <?php echo $res['email'] ?></p>
                    <p>Permis de conduire</p>
                </div>
                <img src="./style/cvshow.png" alt="">
            </div>

        </div>

        <div id="exp">
            <h3>EXPERIENCES</h3>
            <br>

            <table>
                <tr>
                    <td class="dateD">Février 2020</td>
                    <td class="mission" rowspan="2">Mission :<br> - Analyse des comptes
                        - Etablir le budget annuel
                        - Clôture des comptes</td>
                </tr>
                <tr>
                    <td class="dateF">Février 2021</td>
                    <td></td>
                </tr>
                <tr></tr>
                <tr>
                    <td class="dateD">Mars 2020</td>
                    <td class="mission" rowspan="2">Mission :<br> Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                        Autem quae
                        veniam aliquid
                        eveniet quisquam
                        libero itaque, eum repellat repellendus aperiam doloribus tempore quod asperiores architecto
                        maiores
                        voluptas illo, magnam labore?</td>
                </tr>
                <tr>
                    <td class="dateF">Avril 2021</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div id="cursus">
            <h3>FORMATIONS</h3>
            <br>

            <table>
                <tr>
                    <td class="dateD">Diplôme</td>
                    <td class="mission">
                        Licence en science de gestion option finance et comptabilité
                    </td>
                </tr>
                <tr>
                    <td class="dateF">Etablissement</td>
                    <td>Dely ibrahim</td>
                </tr>
                <tr></tr>
                <tr>
                    <td class="dateD">Diplôme</td>
                    <td class="mission">
                        Bts en informatique option base de donner
                    </td>
                </tr>
                <tr>
                    <td class="dateF">Etablissement</td>
                    <td>Mohamed tayeb boucena</td>
                </tr>
                <tr></tr>
            </table>
        </div>

        <div id="centre">
            <h3>CENTRES D'INTERETS</h3>
            <br>

            <p>sport, foot, baseball</p>
        </div>

    </div>
    <?php include('footer.php'); ?>
</body>

</html>