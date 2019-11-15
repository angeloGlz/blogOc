<!-- ------------------------------------------------------- -->
<!DOCTYPE html>
<html>
  <head>
    <title> Billets </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="public/styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="public/styles/styles_back/styles.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php?action=listBillets">Back Office</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mon compte <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html"> Profile </a></li>
	                          <li><a href="login.html"> Déconnexion </a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php?action=page_liste_billets"><i class="glyphicon glyphicon-home"></i> billets</a></li>
                    <li><a href="index.php?action=page_liste_commentaires"><i class="glyphicon glyphicon-envelope"></i> Commentaires</a></li>
                    <li><a href="index.php?action=page_publier_billet"><i class="glyphicon glyphicon-pencil"></i> Publier</a></li>
                    <li><a href="index.php"><i class="glyphicon glyphicon-pencil"></i> Revenir sur le site</a></li>
                </ul>
             </div>
		   </div>
		<h2 class="titleH2">Commentaires</h2>   
		<div class="bloc_com">   
			<h4>commentaire(s) signalé(s)</h4>
			<?php 
				foreach ($listCom as $com) { 
					if($com->getSignaler() == 1){ ?>
						<div class="com_signaler">
							<div class="pseudo_date">
				              <p class="pseudo_com">Posté par : <strong><?php echo $com->getPseudo(); ?></strong> le <?php echo $com->getDate(); ?></p>
				              <div class="bloc_btn">
				              	<form method="post" action="index.php?action=designalerCommentaire" class="bloc_btn">
				              		<input type="hidden" name="idCom" value="<?php echo $com->getId(); ?>">
				              		<input type="submit" name="btnDesignaler" value="désignaler">
				              	</form>
				              	<form method="post" action="index.php?action=supprimerCommentaire" class="bloc_btn">
				              		<input type="hidden" name="idCom" value="<?php echo $com->getId(); ?>">
				              		<input type="submit" name="btnSupprimer" value="supprimer">
				              	</form>
				              </div>
				            </div>
				            <p class="texte_com"><?php echo $com->getCommentaire(); ?></p>
						</div>
			<?php  } 
				}?>
		</div>

		<div class="bloc_com">   
			<h4>commentaire(s) non signalé(s)</h4>
			<?php 
				foreach ($listCom as $com) { 
					if($com->getSignaler() == 0){ ?>

					<div class="com">
						<div class="pseudo_date">
			              <p class="pseudo_com">Posté par : <strong><?php echo $com->getPseudo(); ?></strong> le <?php echo $com->getDate(); ?></p>
			              <form method="post" action="index.php?action=supprimerCommentaire">
			              	<input type="hidden" name="idCom" value="<?php echo $com->getId(); ?>">
			              	<input type="submit" name="supprimerCom" value="supprimer">
			              </form>
			            </div>
			            <p class="texte_com"><?php echo $com->getCommentaire(); ?></p>
					</div>
			<?php  } 
				}?>
		</div>

		</div>   
    </div>

	<!-- ----------------------------------------- -->

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/js/js_back/jsAdd.js"></script>
    <script src="public/styles/js/js_back/custom.js"></script>

  </body>
</html>

<!-- ------------------------------------------------------- -->