<?php include('Connexion.php');

$resultat = array();
$liste = $pdo->query('select * from candidat ');
$where = ' where ';

if (isset($_GET['email']) !== "") {
    $where .= '';
}

if (isset($_GET['fullname']) || isset($_GET['email']) || isset($_GET['poste']) || isset($_GET['diplome'])) {
    var_dump($_GET);

    /*$email = empty($_GET['email']) ? "" : $_GET['email'];
    $poste = empty($_GET['poste']) ? "" : $_GET['poste'];
    $diplome = empty($_GET['diplome']) ? "" : $_GET['diplome'];*/

    //echo "email = $email | poste = $poste | diplome = $diplome";
    //if (empty($_GET['fullname'])) {
    //    echo "est vide";
    //}
    //if ($_GET['fullname'] === "" && $_GET['email'] === "" && $_GET['poste'] === "" && $_GET['diplome'] === "") {
    $liste = $pdo->prepare("SELECT c.prenom,c.nom,c.adresse,c.email,c.telephone 
    FROM candidat as c,formation as f,expérience as e  
    WHERE e.id=c.id and f.id=c.id and c.email like '%amine%' and c.poste like '%%' and c.diplome like '%%'
    ");
    $liste->execute();
    /*$liste->execute(array(
        ':email' => $email
        /*':diplome' => $_GET['diplome'],
        ':poste' => $_GET['poste'],*/
    //));*/
    $resultat = $liste->fetchAll(PDO::FETCH_ASSOC);
    //}
} else {
    $liste = $pdo->query('select * from candidat ');
    $resultat = $liste->fetchAll(PDO::FETCH_ASSOC);
}
//var_dump($resultat);
//echo "ok";


//if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
//    $url = "https://";
//else
//    $url = "http://";
// Append the host(domain name, ip) to the URL.   
//$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
//$url .= $_SERVER['REQUEST_URI'];

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
                                    <th>Nom et Prénom :</th>
                                    <th>Email</th>
                                    <th>Poste</th>
                                    <th>Diplôme</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="searchinp" type="text" name="fullname"
                                                placeholder="Nom et Prénom.."></td>
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

                            <!--
                            <tr class="claire">
                                <th><a href="#"> mokhtar</a></th>
                                <th>Adresse</th>
                                <th>Téléphonne</th>
                                <th>Email</th>
                                <th><a href="#"><img src="style/vue.png"></a></th>
                            </tr>
                            <tr class="foncé">
                                <th><a href="#">Cheraitia amine</a></th>
                                <th>Adresse</th>
                                <th>Téléphonne</th>
                                <th>Email</th>
                                <th><a href="#"><img src="style/vue.png"></a></th>
                            </tr>
                            <tr class="claire">
                                <th><a href=""> Nom et prénom</a></th>
                                <th>Adresse</th>
                                <th>Téléphonne</th>
                                <th>Email</th>
                                <th><a href="#"><img src="style/vue.png"></a></th>
                            </tr>
                            <tr class="foncé">
                                <th><a href=""> Nom et prénom</a></th>
                                <th>Adresse</th>
                                <th>Téléphonne</th>
                                <th>Email</th>
                                <th><a href="#"><img src="style/vue.png"></a></th>
                            </tr>-->
                        </tbody>
                    </table>

                </div>
            </div>
            <!--
            <div class="sidebar">
                 
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

        <?php include('footer.php'); ?>
    </div>
</body>

</html>