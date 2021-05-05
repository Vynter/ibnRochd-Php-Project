<?php include("Connexion.php");

//echo "edit de " . $_GET['id'];

$q = $pdo->query("select distinct * from candidat where id = " . $_GET['id'] . "");
//$q->execute(array($_GET['id']));
$res = $q->fetch();

if (($_GET['id'] == "") || ($q->rowCount() == 0)) {
    header('Location: servicesconseils.php');
}


//langue
$qlAff = $pdo->query("SELECT * FROM parler WHERE  id= " . $_GET['id'] . "");
$langAff = $qlAff->fetchAll(PDO::FETCH_ASSOC);
$id_langues = array();
foreach ($langAff as  $value) {
    array_push($id_langues, $value['id_langue']);
}
//maitrise
$qlogAff = $pdo->query("SELECT * FROM maitrise WHERE  id= " . $_GET['id'] . "");
$logAff = $qlogAff->fetchAll(PDO::FETCH_ASSOC);
$id_logiciel = array();
foreach ($logAff as  $value) {
    array_push($id_logiciel, $value['id_logiciel']);
}

var_dump($id_logiciel);


$ql = $pdo->query("select * from langue");
$lang = $ql->fetchAll(PDO::FETCH_ASSOC);

$qs = $pdo->query("select * from logiciel");
$soft = $qs->fetchAll(PDO::FETCH_ASSOC);

$qci = $pdo->query("select id_loisir, description from loisir");
$loisirs = $qci->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST) && count($_POST) > 0) {
    $candidat = $pdo->prepare("INSERT INTO `candidat` (`id`, `prenom`, `nom`, `adresse`, `telephone`, `email`, `permis`) 
    VALUES (NULL, :prenom, :nom, :adresse, :telephone, :email, :permis) ");
    $candidat->execute(array(
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'telephone' => $_POST['telephone'],
        'email' => $_POST['email'],
        'permis' => $_POST['permis'],
    ));
    //echo "enregistrement fait" . $pdo->lastInsertId();
    $lastId = $pdo->lastInsertId();
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
                                    <td><input type="text" name="prenom" id="prenom" value=" <?= $res['prenom']; ?>"
                                            placeholder="Votre Prenom .."></td>
                                    <td><input type="text" name="nom" id="nom" value=" <?= $res['nom']; ?>"
                                            placeholder="Votre Nom .."></td>
                                    <td><input type="text" name="adresse" id="adresse" value=" <?= $res['adresse']; ?>"
                                            placeholder="Votre Adresse ..">
                                    </td>
                                    <td><input type="text" name="telephone" id="telephone"
                                            value=" <?= $res['telephone']; ?>" placeholder="Votre Téléphone .."></td>
                                    <td><input type="text" name="email" id="email" value=" <?= $res['email']; ?>"
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
                                <tr>
                                    <td><input type="date" name="dateD" id="dateD"></td>
                                    <td><input type="date" name="dateF" id="dateF"></td>
                                    <td><input type="text" name="entreprise" id="entreprise"
                                            placeholder="Entreprise .."></td>
                                    <td><input type="text" name="secteur" id="secteur" placeholder="Secteur .."></td>
                                    <td><input type="text" name="poste" id="poste" placeholder="Poste .."></td>
                                    <td><textarea name="mission" id="mission" cols="30" rows="10"
                                            placeholder="Vos missions et tâches .."></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <div id="formCandidat">
                        <h1>Formation</h1>
                        <hr><br><br>
                        <table>
                            <tbody>
                                <tr>
                                    <th>Diplôme*:</th>
                                    <th>Etablissement*:</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="diplome" id="diplome" placeholder="Votre Diplome ..">
                                    </td>
                                    <td><input type="text" name="etablissement" id="etablissement"
                                            placeholder="Etablissement ..">
                                    </td>

                                </tr>
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
                                                echo '<option value="' . $loisir['id_loisir'] . '">' . $loisir['description'] . '</option>';
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