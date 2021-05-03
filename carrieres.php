<?php include("Connexion.php");

$ql = $pdo->query("select * from langue");
$lang = $ql->fetchAll(PDO::FETCH_ASSOC);

$qs = $pdo->query("select * from logiciel");
$soft = $qs->fetchAll(PDO::FETCH_ASSOC);

$qci = $pdo->query("select id_loisir, description from loisir");
$loisirs = $qci->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>IT Dev</title>
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
                <form action="" method="get">
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
                                    <td><input type="text" name="prenom" id="" placeholder="Votre Prenom .."></td>
                                    <td><input type="text" name="nom" id="" placeholder="Votre Nom .."></td>
                                    <td><input type="text" name="adresse" id="" placeholder="Votre Adresse .."></td>
                                    <td><input type="text" name="telephone" id="" placeholder="Votre Téléphone .."></td>
                                    <td><input type="text" name="email" id="" placeholder="Votre Email .."></td>
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
                                    <td><input type="date" name="dateD" id=""></td>
                                    <td><input type="date" name="dateF" id=""></td>
                                    <td><input type="text" name="entreprise" id="" placeholder="Entreprise .."></td>
                                    <td><input type="text" name="secteur" id="" placeholder="Secteur .."></td>
                                    <td><input type="text" name="poste" id="" placeholder="Poste .."></td>
                                    <td><textarea name="mission" id="" cols="30" rows="10"></textarea></td>
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
                                    <td><input type="text" name="diplome" id="" placeholder="Votre Diplome .."></td>
                                    <td><input type="text" name="etablissement" id="" placeholder="Etablissement ..">
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

                    <button type="submit">Enregistrer</button>

                </form>

            </div>

        </div>

    </div>
    <?php include('footer.php'); ?>
    <script src="./script/javascript.js" defer></script>
</body>

</html>