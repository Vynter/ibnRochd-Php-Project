<?php include("Connexion.php"); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Noir Bleu Blanc</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
    <div id="main">
        <div id="header">

            <?php include('header.php'); ?>
        </div>

        <div id="site_content">

            <div id="content">
                <!-- insérez le contenu de la page ici -->
                <h1>Bienvenue sur le site noir_bleu_blanc</h1>
                <p>Depuis 1998, Noir_Bleu_Blanc accompagne les entreprises et organisations dans leur transformation
                    numérique
                    en offrant des services-conseils spécialisés en technologie de l’information à Alger et à Sétif.
                    Services</p>
                <p> Les organisations évoluent constamment et doivent faire face à de nombreux défis. Noir_Bleu_Blanc
                    vous
                    accompagne dans toutes les étapes de votre projet de transformation numérique, afin qu’elle soit
                    couronnée de
                    succès.
                    Grâce à nos communautés d’experts, nous sommes en mesure de vous proposer une offre unique de
                    services
                    intégrés, adaptés à votre situation et qui répondent à vos besoins d’affaires.
                </p>
                </ul>
            </div>
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

        </div>

        <div id="footer">
            Copyright &copy; Noir_bleu_blanc
        </div>

    </div>
</body>

</html>