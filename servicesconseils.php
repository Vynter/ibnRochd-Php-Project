<!DOCTYPE HTML>
<html>

<head>
    <title>Noir Bleu Blanc - Services-Conseils</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
    <div id="main">
        <div id="header">
            <div id="logo">
                <div id="logo_text">
                    <!-- class = "logo_colour", vous permet de changer la couleur du texte -->
                    <h1><a href="index.html">Noir<span class="logo_couleur">_Bleu</span><span
                                class="logo_couleur2">_Blanc</span></a></h1>
                    <h2>Service et développement</h2>
                </div>
            </div>
            <?php include('header.php'); ?>
        </div>

        <div id="site_content">

            <div id="content">
                <!-- insérez le contenu de la page ici -->
                <h1>Liste des CV</h1>
                <p>Reconnue depuis plus de 25 ans pour son approche sur mesure axée sur les résultats et pour sa
                    démarche
                    rigoureuse de gestion de projets en 5 étapes, Noir_Bleu_Blanc vous offre un accompagnement
                    stratégique TI
                    360°, en mode projet ou impartition, une compréhension pointue de vos enjeux et priorités d’affaires
                    ainsi
                    qu’une volonté d’établir des partenariats à long terme.
                    Ainsi, en nous choisissant comme partenaire TI, vous bénéficiez de l’expertise et de l’engagement
                    d’une équipe
                    professionnelle et pouvez alors consacrer toutes vos ressources à la réalisation de votre plan
                    d’affaires.</p>
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