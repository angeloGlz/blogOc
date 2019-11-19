<!DOCTYPE html>
<!--
Template Name: Preevent
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="fr">
<head>
<title>Jean Forteroche</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="public/styles/styles_front/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('public/images/alaska.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.php">Jean Forteroche</a></h1>
      </div>
      <!-- ################################################################################################ -->
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Accueil</a></li>
          <li><a class="drop" href="#">Biographie</a>
          </li>
          <li><a class="drop" href="#">Chapitres</a>
          </li>
          <li><a class="drop" href="index.php?action=page_connexion">Admin</a>
          </li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <article id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h2 class="heading">Billet simple pour l'Alaska</h2>
    <div class="txtwrap">
      <p>Venez découvrir mon nouveau roman en ligne publié chapitre par chapitre !</p>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="#">lire le roman</a></li>
        </ul>
      </footer>
    </div>
    <!-- ################################################################################################ -->
  </article>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3 bloc_bio">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h6 class="heading">Biographie</h6>
    </div>
    <ul class="d-flex">
      <li class="col-4">
        <img src="public/images/forteroche.jpg" alt="Portrait de Jean Rochefort">
      </li>
      <li class="col-6">
        <p>
          Jean Forteroche a étudié l'économie et, avant de se mettre à l'écriture, a travaillé en tant que représentant de ventes senior pour une compagnie d'échanges internationaux. Sa première nouvelle, Le Sorceleur (Wiedźmin), fut publiée en 1986 dans Fantastyka, le magazine de littérature fantastique polonais de référence, et reçut un énorme succès de la part des critiques. Sapkowski a créé un cycle de contes basé sur le monde du Sorceleur qui comprend trois collections d'histoires courtes et cinq romans. Ce cycle et ses nombreux autres livres ont fait de lui l'un des auteurs fantastiques les plus connus de la Pologne des années 1990.

          Le personnage principal du Sorceleur est Geralt, un assassin mutant qui a été entraîné depuis son enfance à chasser et à détruire monstres et autres vermines. Geralt évolue dans un univers moral ambigu, réussissant à suivre son code éthique personnel cohérent. À la fois cynique et fier, Geralt a été comparé au personnage de Philip Marlowe créé par Raymond Chandler. Le monde dans lequel se déroulent ses aventures est fortement inspiré par l'histoire polonaise et la mythologie slave.

          Forteroche a gagné cinq fois le prix Janusz A. Zajdel, trois fois pour les nouvelles Mniejsze zło (Moindre mal) (1990), Miecz przeznaczenia (L'Épée du Destin) (1992), W leju po bombie (Dans un cratère de bombe) (1993), et deux fois pour les romans Krew elfów (Le Sang des Elfes) (1994) et Narrenturm (2002). En 2009, il gagne le tout premier prix David Gemmell du meilleur roman de fantasy pour Krew elfów (Le Sang des Elfes)1.

          En 1997, Forteroche a remporté le prestigieux prix Paszport Polityki, remis annuellement aux artistes ayant de fortes perspectives de succès international.

          En 2001, une série télévisée basée sur le cycle du Sorceleur est sortie en Pologne et à l'international, intitulée Wiedźmin (The Hexer). Un film du même nom fut monté à partir de la série, mais l'un comme l'autre ont été des échecs commerciaux.

          Les livres de Forteroche sont traduits en anglais, hongrois, tchèque, russe, lituanien, allemand, espagnol, français, slovaque et portugais.

          L'éditeur de jeux polonais CD Projekt a réalisé un jeu de rôle PC basé sur cet univers, appelé The Witcher, sorti le 26 octobre 2007 en Europe. Une suite appelée The Witcher 2 : Assassins of Kings est sortie le 17 mai 2011 toujours développée par le studio CD Projekt. Et le 19 mai 2015 est sorti The Witcher 3: Wild Hunt, toujours développé par CD Projekt.
        </p>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3 bloc_chapitres">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h6 class="heading">Chapitres</h6>
      <p>Retrouver les chapitres du dernier livre de Jean Forteroche et partagez votre reessentit !</p>
    </div>
    <div class="group element team btmspace-80 bloc_chapitres">

      <?php
          foreach ($listBillets as $billet) { ?>
            <article class="one_quarter first"><img src="public/images/<?php echo $billet->image(); ?>" alt="">
              <div class="txtwrap">
                <h6 class="heading"><?php echo $billet->titre(); ?></h6>
                <footer><a href="index.php?action=afficherChapitre&chapitre=<?php echo $billet->id(); ?>">lire ce chapitre</a></footer>
              </div>
            </article>
      <?php } ?>

    </div>
    <footer class="center"><a class="btn" href="#">Commander le livre papier</a></footer>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - Formation OpenClassrooms - FDJ projet 4: créer un blog pour un écrivain</p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="public/js/scripts_front/jquery.min.js"></script>
<script src="public/js/scripts_front/jquery.backtotop.js"></script>
<script src="public/js/scripts_front/jquery.mobilemenu.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>