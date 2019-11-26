<!DOCTYPE html>
<!--
Template Name: Preevent
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
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
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3 bloc_chapitres">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <div class="imgChapitreView">
        <img src="public/images/<?php echo $billet->image(); ?>">
      </div>
      
      <h3 class="heading titreChapitreView"><?php echo $billet1->titre(); ?></h3>
      <p> <?php echo $billet1->texte(); ?></p>
    </div>
    <!-- ################################################################################################ -->
    <h3 class="titreBlocCom">Commentaires</h3>

    <div class="bloc_com">
      <?php
      if (!empty($comChapitre)) {
        foreach ($comChapitre as $com) { ?>
          <div <?php if($com->getSignaler() == 1){ echo "class=com_signaler";} else{echo "class=com";} ?>>
            <div class="pseudo_date">
              <p class="pseudo">Posté par : <strong><?php echo $com->getPseudo(); ?></strong> le <?php echo $com->getDate();?></p>
              <button><a href="index?action=signalerCommentaire&commentaire=<?php echo $com->getId()?>&billet=<?php echo $billet1->id(); ?>">signaler</a></button>
            </div>
            <p class="texteCom"><?php echo $com->getCommentaire(); ?></p>
          </div>
      <?php  
        }
      }
      ?>
      
    </div>

    <div class="blocForm">
        <?php 
            if (!empty($_SESSION['erreur_commentaire'])) { ?>
              <div class="erreur_commentaire"><?php echo $_SESSION['erreur_commentaire']; unset($_SESSION['erreur_commentaire']); ?></div>
         <?php } ?>
        <form method="POST" action="index.php?action=checkComExist" class="formCom">
            <label for="pseudo">Pseudo
                <input type="text" name="pseudo" class="inputFront" required="true" placeholder="(maximum 30 caractères)">
            </label>
            <label for="commentaire">Commentaire
                <textarea name="commentaire" class="inputFront textareaFront" required="true" placeholder="(maximum 500 caractères)"></textarea> 
            </label> 
            <input type="hidden" name="idBillet" value="<?php echo $billet1->id(); ?>">
            <input type="submit" name="btnPublierCom" value="Publier">
        </form>
    </div>
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