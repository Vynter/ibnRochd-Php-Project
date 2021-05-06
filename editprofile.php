<?php include("Connexion.php");

//echo "edit de " . $_GET['id'];

$q = $pdo->query("select distinct * from candidat where id = " . $_GET['id'] . "");
//$q->execute(array($_GET['id']));
$res = $q->fetch();

if (($_GET['id'] == "") || ($q->rowCount() == 0)) {
    header('Location: servicesconseils.php');
}

if (isset($_POST["del"]) && count($_POST) > 0) {

    $delExp = $pdo->query("DELETE FROM experience WHERE id = " . $_GET['id'] . "");
    $delAvoir = $pdo->query("DELETE FROM avoir WHERE id = " . $_GET['id'] . "");
    $delMaitrise = $pdo->query("DELETE FROM maitrise WHERE id = " . $_GET['id'] . "");
    $delParler = $pdo->query("DELETE FROM parler WHERE id = " . $_GET['id'] . "");
    $delParler = $pdo->query("DELETE FROM formation WHERE id = " . $_GET['id'] . "");
    $delCandidat = $pdo->query("DELETE FROM candidat WHERE id = " . $_GET['id'] . "");

    header('Location: servicesconseils.php');
}

//langue formulaire
$qlAff = $pdo->query("SELECT * FROM parler WHERE  id= " . $_GET['id'] . "");
$langAff = $qlAff->fetchAll(PDO::FETCH_ASSOC);
$id_langues = array();
foreach ($langAff as  $value) {
    array_push($id_langues, $value['id_langue']);
}
//maitrise formulaire
$qlogAff = $pdo->query("SELECT * FROM maitrise WHERE  id= " . $_GET['id'] . "");
$logAff = $qlogAff->fetchAll(PDO::FETCH_ASSOC);
$id_logiciel = array();
foreach ($logAff as  $value) {
    array_push($id_logiciel, $value['id_logiciel']);
}
//expérience formulaire
$qExp = $pdo->query("SELECT * FROM `experience`  where id = " . $_GET['id'] . "");
$resExp = $qExp->fetchAll(PDO::FETCH_ASSOC);

//formation  formulaire
$qFormation = $pdo->query("SELECT * FROM `formation`  where id = " . $_GET['id'] . "");
$resFor = $qFormation->fetchAll();
//loisir  formulaire
$qloisir = $pdo->query("SELECT * FROM `avoir`  WHERE  id= " . $_GET['id'] . "");
$loisirAff = $qloisir->fetchAll(PDO::FETCH_ASSOC);
$id_loisir = array();
foreach ($loisirAff as  $value) {
    array_push($id_loisir, $value['id_loisir']);
}


$ql = $pdo->query("select * from langue");
$lang = $ql->fetchAll(PDO::FETCH_ASSOC);

$qs = $pdo->query("select * from logiciel");
$soft = $qs->fetchAll(PDO::FETCH_ASSOC);

$qci = $pdo->query("select id_loisir, description from loisir");
$loisirs = $qci->fetchAll(PDO::FETCH_ASSOC);

//update

if (isset($_POST) && count($_POST) > 0) {

    //update candidat
    $candidUD = $pdo->prepare("UPDATE `candidat` SET `prenom`= :prenom ,`nom`= :nom,`adresse`= :adresse ,`telephone`= :telephone,`email`= :email,`permis`= :permis WHERE id = :id");

    $candidUD->execute(array(
        'id' => $_GET['id'],
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'telephone' => $_POST['telephone'],
        'email' => $_POST['email'],
        'permis' => $_POST['permis'],
    ));

    // logiciel & langue
    $delMaitrise = $pdo->query("DELETE FROM maitrise WHERE id = " . $_GET['id'] . "");
    $delParler = $pdo->query("DELETE FROM parler WHERE id = " . $_GET['id'] . "");
    foreach ($_POST['langue'] as $k) {
        //echo $k . "<br>";
        $langue = $pdo->prepare("INSERT INTO `parler` (`id_langue`, `id`) VALUES (:id_langue , :id ) ");
        $langue->execute(array(
            'id_langue' => $k,
            'id' => $_GET['id']
        ));
    }
    foreach ($_POST['logiciel'] as $l) {

        $logiciel = $pdo->prepare("INSERT INTO `maitrise` (`id_logiciel`, `id`) VALUES (:id_logiciel, :id) ");
        $logiciel->execute(array(
            'id_logiciel' => $l,
            'id' => $_GET['id']
        ));
    }
    // loisir
    $delAvoir = $pdo->query("DELETE FROM avoir WHERE id = " . $_GET['id'] . "");
    foreach ($_POST['loisir'] as $loisir) {

        $loisirs = $pdo->prepare("INSERT INTO `avoir` (`id_loisir`, `id`) VALUES (:id_loisir, :id) ");
        $loisirs->execute(array(
            'id_loisir' => $loisir,
            'id' => $_GET['id']
        ));
    }

    //expérience
    $delExp = $pdo->query("DELETE FROM experience WHERE id = " . $_GET['id'] . "");
    if (
        $_POST['dateD0'] !== "" && $_POST['dateF0'] !== "" && $_POST['entreprise0'] !== ""
        && $_POST['secteur0'] !== "" && $_POST['poste0'] !== "" && $_POST['mission0'] !== ""
    ) {

        $exp = $pdo->prepare("INSERT INTO `experience` (`id_exp`, `date_debut`, `date_fin`, `nom_ent`, `secteur`, `poste`, `mission`, `id`) 
        VALUES (NULL, :dateD, :dateF, :entreprise, :secteur, :poste, :mission, :id) ");
        $exp->execute(array(
            'dateD' => $_POST['dateD0'],
            'dateF' => $_POST['dateF0'],
            'entreprise' => $_POST['entreprise0'],
            'secteur' => $_POST['secteur0'],
            'poste' => $_POST['poste0'],
            'mission' => $_POST['mission0'],
            'id' => $_GET['id']
        ));
    }

    if (
        $_POST['dateD1'] !== "" && $_POST['dateF1'] !== "" && $_POST['entreprise1'] !== ""
        && $_POST['secteur1'] !== "" && $_POST['poste1'] !== "" && $_POST['mission1'] !== ""
    ) {

        $exp = $pdo->prepare("INSERT INTO `experience` (`id_exp`, `date_debut`, `date_fin`, `nom_ent`, `secteur`, `poste`, `mission`, `id`) 
        VALUES (NULL, :dateD, :dateF, :entreprise, :secteur, :poste, :mission, :id) ");
        $exp->execute(array(
            'dateD' => $_POST['dateD1'],
            'dateF' => $_POST['dateF1'],
            'entreprise' => $_POST['entreprise1'],
            'secteur' => $_POST['secteur1'],
            'poste' => $_POST['poste1'],
            'mission' => $_POST['mission1'],
            'id' => $_GET['id']
        ));
    }

    if (
        $_POST['dateD2'] !== "" && $_POST['dateF2'] !== "" && $_POST['entreprise2'] !== ""
        && $_POST['secteur2'] !== "" && $_POST['poste2'] !== "" && $_POST['mission2'] !== ""
    ) {

        $exp = $pdo->prepare("INSERT INTO `experience` (`id_exp`, `date_debut`, `date_fin`, `nom_ent`, `secteur`, `poste`, `mission`, `id`) 
        VALUES (NULL, :dateD, :dateF, :entreprise, :secteur, :poste, :mission, :id) ");
        $exp->execute(array(
            'dateD' => $_POST['dateD2'],
            'dateF' => $_POST['dateF2'],
            'entreprise' => $_POST['entreprise2'],
            'secteur' => $_POST['secteur2'],
            'poste' => $_POST['poste2'],
            'mission' => $_POST['mission2'],
            'id' => $_GET['id']
        ));
    }


    //formation
    $delParler = $pdo->query("DELETE FROM formation WHERE id = " . $_GET['id'] . "");

    if (
        $_POST['diplome0'] !== "" && $_POST['etablissement0'] !== ""
    )
        $formation = $pdo->prepare("INSERT INTO `formation` ( `diplome`, `établissement`, `id`) 
    VALUES ( :diplome, :etablissement, :id)");
    $formation->execute(array(
        'diplome' => $_POST['diplome0'],
        'etablissement' => $_POST['etablissement0'],
        'id' =>  $_GET['id']
    ));

    if (
        $_POST['diplome1'] !== "" && $_POST['etablissement1'] !== ""
    )
        $formation = $pdo->prepare("INSERT INTO `formation` ( `diplome`, `établissement`, `id`) 
    VALUES ( :diplome, :etablissement, :id)");
    $formation->execute(array(
        'diplome' => $_POST['diplome1'],
        'etablissement' => $_POST['etablissement1'],
        'id' =>  $_GET['id']
    ));

    if (
        $_POST['diplome2'] !== "" && $_POST['etablissement2'] !== ""
    )
        $formation = $pdo->prepare("INSERT INTO `formation` ( `diplome`, `établissement`, `id`) 
    VALUES ( :diplome, :etablissement, :id)");
    $formation->execute(array(
        'diplome' => $_POST['diplome2'],
        'etablissement' => $_POST['etablissement2'],
        'id' =>  $_GET['id']
    ));


    header('Location: servicesconseils.php');
}





?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Modifier le CV - IT Dev</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
    <link rel="stylesheet" type="text/css" href="style/carrier.css" title="style" />
</head>

<body>
    <div id="main">
        <div id="header">

            <?php include('header.php'); ?>
        </div>
        <div id="site_content">

            <div id="main">
                <!-- insérez le contenu de la page ici -->
                <h1>Modifier le CV</h1>
                <form action="" method="post" id="myForm">
                    <div id="infoCandidat">
                        <table>
                            <tbody>
                                <tr>
                                    <th>
                                        Prénom*:
                                    </th>
                                    <th>
                                        Nom*:
                                    </th>
                                    <th>
                                        Adresse*:
                                    </th>
                                    <th>
                                        Téléphone*:
                                    </th>
                                    <th>
                                        Email*:
                                    </th>
                                    <th>
                                        Permis*:
                                    </th>
                                </tr>

                                <tr>
                                    <td><input type="text" name="prenom" id="prenom" value="<?= $res['prenom']; ?>"
                                            placeholder="Votre Prenom .."></td>
                                    <td><input type="text" name="nom" id="nom" value="<?= $res['nom']; ?>"
                                            placeholder="Votre Nom .."></td>
                                    <td><input type="text" name="adresse" id="adresse" value="<?= $res['adresse']; ?>"
                                            placeholder="Votre Adresse ..">
                                    </td>
                                    <td><input type="text" name="telephone" id="telephone"
                                            value="<?= $res['telephone']; ?>" placeholder="Votre Téléphone .."></td>
                                    <td><input type="text" name="email" id="email" value="<?= $res['email']; ?>"
                                            placeholder="Votre Email .."></td>
                                    <td>

                                        <select name="permis" id="permis">
                                            <option value="0" <?= $res['permis'] == 0 ? "selected" : ""; ?>>Non
                                            </option>
                                            <option value="1" <?= $res['permis'] == 1 ? "selected" : ""; ?>>Oui
                                            </option>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Langue(s)*:
                                    </th>
                                    <th>
                                        Logiciel(s)*:
                                    </th>

                                </tr>
                                <tr>
                                    <td>
                                        <select name="langue[]" id="lng" multiple>
                                            <?php
                                            foreach ($lang as $lng) {
                                                if (in_array($lng['id_langue'], $id_langues)) {
                                                    $selectL = " selected ";
                                                } else {
                                                    $selectL = "";
                                                }

                                                echo "<option  value='" . $lng['id_langue'] . "' $selectL  >" . $lng['description'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>

                                        <select name="logiciel[]" id="log" multiple>
                                            <?php
                                            foreach ($soft as $s) {
                                                if (in_array($s['id_logiciel'], $id_logiciel)) {
                                                    $selectLog = " selected ";
                                                } else {
                                                    $selectLog = "";
                                                }
                                                echo "<option value='" . $s['id_logiciel'] . "' $selectLog >" . $s['description'] . "</option>";
                                            }
                                            ?>


                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div id="expCandidat">
                        <h1>Expérience(s)</h1>
                        <hr><br><br>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Date Debut*:</th>
                                    <th>Date Fin*:</th>
                                    <th>Nom de l'entreprise*:</th>
                                    <th>Secteur*:</th>
                                    <th>Poste*:</th>
                                    <th>Missions et tâches réalisées*:</th>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($resExp as $resEx) {
                                    echo "
                                    <tr>
                                    <td><input type='date' name='dateD$i' id='dateD'
                                            value='" . $resEx['date_debut'] . "'>
                                    </td>
                                    <td><input type='date' name='dateF$i' id='dateF' value='" . $resEx['date_fin'] . "'>
                                    </td>
                                    <td><input type='text' name='entreprise$i' id='entreprise' placeholder='Entreprise ..'
                                            value='" . $resEx['nom_ent'] . "'></td>
                                    <td><input type='text' name='secteur$i' id='secteur' placeholder='Secteur ..'
                                            value='" . $resEx['secteur'] . "'></td>
                                    <td><input type='text' name='poste$i' id='poste' placeholder='Poste ..'
                                            value='" . $resEx['poste'] . "'></td>
                                    <td><textarea name='mission$i' id='mission' cols='30' rows='10'
                                            placeholder='Vos missions et tâches ..'>" . $resEx['mission'] . "</textarea>
                                    </td>
                                    </tr>

                                ";
                                    $i++;
                                }
                                //echo $i;
                                for ($j = $i; $j < 3; $j++) {
                                    echo "
                                    <tr>
                                    <td><input type='date' name='dateD$j' id='dateD' value=''>
                                    </td>
                                    <td><input type='date' name='dateF$j' id='dateF' value=''>
                                    </td>
                                    <td><input type='text' name='entreprise$j' id='entreprise' placeholder='Entreprise ..' value=''></td>
                                    <td><input type='text' name='secteur$j' id='secteur' placeholder='Secteur ..' value=''></td>
                                    <td><input type='text' name='poste$j' id='poste' placeholder='Poste ..' value=''>
                                    </td>
                                    <td><textarea name='mission$j' id='mission' cols='30' rows='10' placeholder='Vos missions et tâches ..'></textarea>
                                    </td>
                                </tr>
                                    ";
                                }
                                ?>



                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div id=" formCandidat">
                        <h1>Formation</h1>
                        <hr><br><br>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Diplôme*:</th>
                                    <th>Etablissement*:</th>
                                </tr>
                                <?php
                                $k = 0;
                                foreach ($resFor as $resf) {
                                    echo "
                                    <tr>
                                        <td><input type='text' name='diplome$k' id='diplome' placeholder='Votre Diplome ..'
                                                value='" . $resf['diplome'] . "'>
                                        </td>
                                        <td><input type='text' name='etablissement$k' id='etablissement'
                                                placeholder='Etablissement ..' value='" . $resf['établissement'] . "'>
                                        </td>
                                    </tr>";
                                    $k++;
                                }

                                for ($l = $k; $l < 3; $l++) {
                                    echo "
                                    <tr>
                                        <td><input type='text' name='diplome$l' id='diplome' placeholder='Votre Diplome ..'
                                                value=''>
                                        </td>
                                        <td><input type='text' name='etablissement$l' id='etablissement'
                                                placeholder='Etablissement ..' value=''>
                                        </td>
                                    </tr>";
                                }

                                ?>



                            </tbody>
                        </table>
                    </div><br><br>
                    <div id="loisirCandidat">
                        <h1>Centre d'intêrets</h1>
                        <hr><br><br>
                        <table>
                            <tbody>
                                <tr class="loisir">
                                    <th>Loisir(s)*:</th>
                                </tr>
                                <tr class="loisir">
                                    <td class="loisir">
                                        <select name="loisir[]" id="loisir" multiple>
                                            <?php
                                            foreach ($loisirs as $loisir) {

                                                if (in_array($loisir['id_loisir'], $id_loisir)) {
                                                    $selectCI = " selected ";
                                                } else {
                                                    $selectCI = "";
                                                }


                                                echo "<option value='" . $loisir['id_loisir'] . "' $selectCI >" . $loisir['description'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <button id="sbmt" type="submit">Enregistrer</button>

                </form>
                <form action="" method="POST">
                    <button id="del" name="del" type="submit">Effacer</button>
                </form>
            </div>

        </div>
        <div class="box-modale" v-if="revealModale">
            <div class="overlay" v-on:click="toggleModale"></div>
            <div class="card modale">
                <div class="btn-modale btn">x</div>
                <p>Veuillez saisir le(s) champ(s) obligatoire</p>
                <!--<p id="error"></p>-->
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="./script/validation.js" defer></script>
</body>

</html>