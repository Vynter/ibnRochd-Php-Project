<?php include("Connexion.php");

$ql = $pdo->query("select * from langue");
$lang = $ql->fetchAll(PDO::FETCH_ASSOC);

$qs = $pdo->query("select * from logiciel");
$soft = $qs->fetchAll(PDO::FETCH_ASSOC);

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
                    <div id="expCandidat">

                    </div>
                    <div id="formCandidat">

                    </div>
                    <div id="loisirCandidat">

                    </div>

                    <button type="submit">ok</button>

                </form>

            </div>
            <!--<div class="sidebar">
                <!-- insérez vos éléments de la barre latérale ici 
                <h3>Dernières nouvelles</h3>
                <h4>Lancement d'un nouveau site Web</h4>
                <h5>1er août 2021</h5>
                <p>2021 voit la refonte de notre site Web. Jetez un œil et dites-nous ce que vous en pensez.<br /><a
                        href="#">Lire la suite</a></p>
                <p></p>
                <h4>Lancement d'un nouveau site Web</h4>
                <h5>1er août 2021</h5>
                <p>2021 voit la refonte de notre site Web. Jetez un œil et dites-nous ce que vous en pensez.<br /><a
                        href="#">Lire la suite</a></p>
                <h3>Liens utiles</h3>
                <ul>
                    <li><a href="#">Liens 1</a></li>
                    <li><a href="#">Liens 2</a></li>
                    <li><a href="#">Liens 3</a></li>
                    <li><a href="#">Liens 4</a></li>
                </ul>
                <h3>Chercher</h3>
                <form method="post" action="#" id="search_form">
                    <p>
                        <input class="search" type="text" name="search_field" value="Entrez des mots clés....." />
                        <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;"
                            src="style/search.png" alt="Search" title="Search" />
                    </p>
                </form>
            </div>-->
        </div>

    </div>
    <?php include('footer.php'); ?>
    <script src="./script/javascript.js" defer></script>
</body>

</html>