<?php include("Connexion.php"); ?>

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
            <div class="sidebar">
                <!-- insérez vos éléments de la barre latérale ici -->
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
            </div>
            <div id="content">
                <!-- insérez le contenu de la page ici -->
                <h1>Solutions</h1>
                <p>La création de site internet n’est pas la seule activité du département développement web de
                    Noir_Bleu_Blanc. Au fil des ans, Noir_Bleu_Blanc a été amené à développer une activité de recherche
                    et développement afin de satisfaire des clients sur des interventions spécifiques. Les équipes
                    maîtrisent désormais des logiciels permettant d’apporter des solutions web pour chaque client.

                    Ce savoir-faire éprouvé depuis plus de cinq ans est fréquemment réutilisé pour satisfaire une
                    clientèle de plus en plus portée sur les nouvelles technologies et le e-marketing. Noir_Bleu_Blanc
                    s’adapte à toutes les exigences de votre métier pour vous fournir une solution sur mesure.</p>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>