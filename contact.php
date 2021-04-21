<?php include("Connexion.php"); ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>IT Dev</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
    <style>
    .form_settings {
        margin: 15px 0 0 0;
    }

    .form_settings p {
        padding: 0 0 4px 0;
    }

    .form_settings span {
        float: left;
        width: 200px;
        text-align: left;
    }

    .form_settings input,
    .form_settings textarea {
        padding: 5px;
        width: 299px;
        font: 100% arial;
        border: 1px solid #E5E5DB;
        background: #FFF;
        color: #47433F;
    }

    .form_settings .submit {
        font: 100% arial;
        border: 1px solid;
        width: 99px;
        margin: 0 0 0 212px;
        height: 33px;
        padding: 2px 0 3px 0;
        cursor: pointer;
        background: #000;
        color: #FFF;
    }

    .form_settings textarea,
    .form_settings select {
        font: 100% arial;
        width: 299px;
    }

    .form_settings select {
        width: 310px;
    }

    .form_settings .checkbox {
        margin: 4px 0;
        padding: 0;
        width: 14px;
        border: 0;
        background: none;
    }
    </style>
</head>

<body>
    <div id="main">
        <div id="header">

            <?php include('header.php'); ?>
        </div>

        <div id="site_content">

            <div id="content">
                <!-- insérez le contenu de la page ici -->
                <h1>Contact Us</h1>
                <p>Voici un exemple de l'apparence d'un formulaire de contact avec ce modèle:</p>
                <form action="#" method="post">
                    <div class="form_settings">
                        <p><span>Name</span><input class="contact" type="text" name="your_name" value="" /></p>
                        <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="" />
                        </p>
                        <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50"
                                name="your_enquiry"></textarea></p>
                        <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit"
                                name="contact_submitted" value="submit" /></p>
                    </div>
                </form>
                <p><br /><br />REMARQUE: Un formulaire de contact comme celui-ci nécessiterait un moyen d'envoyer un
                    e-mail à une adresse e-mail.</p>
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
        <?php include('footer.php'); ?>
    </div>
</body>

</html>