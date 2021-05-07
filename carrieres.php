<?php include("Connexion.php");

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

    $lastId = $pdo->lastInsertId();

    foreach ($_POST['langue'] as $k) {

        $langue = $pdo->prepare("INSERT INTO `parler` (`id_langue`, `id`) VALUES (:id_langue , :id ) ");
        $langue->execute(array(
            'id_langue' => $k,
            'id' => $lastId
        ));
    }

    foreach ($_POST['logiciel'] as $l) {

        $logiciel = $pdo->prepare("INSERT INTO `maitrise` (`id_logiciel`, `id`) VALUES (:id_logiciel, :id) ");
        $logiciel->execute(array(
            'id_logiciel' => $l,
            'id' => $lastId
        ));
    }


    $exp = $pdo->prepare("INSERT INTO `experience` (`id_exp`, `date_debut`, `date_fin`, `nom_ent`, `secteur`, `poste`, `mission`, `id`) 
    VALUES (NULL, :dateD, :dateF, :entreprise, :secteur, :poste, :mission, :id) ");
    $exp->execute(array(
        'dateD' => $_POST['dateD'],
        'dateF' => $_POST['dateF'],
        'entreprise' => $_POST['entreprise'],
        'secteur' => $_POST['secteur'],
        'poste' => $_POST['poste'],
        'mission' => $_POST['mission'],
        'id' => $lastId
    ));

    foreach ($_POST['loisir'] as $loisir) {

        $loisirs = $pdo->prepare("INSERT INTO `avoir` (`id_loisir`, `id`) VALUES (:id_loisir, :id) ");
        $loisirs->execute(array(
            'id_loisir' => $loisir,
            'id' => $lastId
        ));
    }

    $formation = $pdo->prepare("INSERT INTO `formation` ( `diplome`, `établissement`, `id`) 
    VALUES ( :diplome, :etablissement, :id)");
    $formation->execute(array(
        'diplome' => $_POST['diplome'],
        'etablissement' => $_POST['etablissement'],
        'id' =>  $lastId
    ));
}



?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Ajouter un CV - IT Dev</title>
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
                <h1>Ajouter un CV</h1>
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
                                    <td><input type="text" name="prenom" id="prenom" placeholder="Votre Prenom .."></td>
                                    <td><input type="text" name="nom" id="nom" placeholder="Votre Nom .."></td>
                                    <td><input type="text" name="adresse" id="adresse" placeholder="Votre Adresse ..">
                                    </td>
                                    <td><input type="text" name="telephone" id="telephone"
                                            placeholder="Votre Téléphone .."></td>
                                    <td><input type="text" name="email" id="email" placeholder="Votre Email .."></td>
                                    <td>

                                        <select name="permis" id="permis">
                                            <option value="0">Non</option>
                                            <option value="1">Oui</option>
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
                                                echo '<option value="' . $lng['id_langue'] . '">' . $lng['description'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>

                                        <select name="logiciel[]" id="log" multiple>
                                            <?php
                                            foreach ($soft as $s) {
                                                echo '<option value="' . $s['id_logiciel'] . '">' . $s['description'] . '</option>';
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