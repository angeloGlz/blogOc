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
	                 <h1><a href="afficherBillets.php">Back Office</a></h1>
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
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> billets</a></li>
                    <li><a href="index.php?action=listBillets"><i class="glyphicon glyphicon-envelope"></i> Commentaires</a></li>
                    <li><a href="index.php?action=publierBillet"><i class="glyphicon glyphicon-pencil"></i> Publier</a></li>
                </ul>
             </div>
		   </div>
		<h2 class="titleH2">Billets</h2>   
		<div class="listBillets">   
			<?php 
				foreach($listBillets as $billet){ ?>
					<div class="billet">
						<div class="texteBillet">
							<h3 class="titreBillet"> <?php echo $billet->titre(); ?> </h3>
						<?php
							$billetWhithHTML = $billet->texte();
							$billetTextNoHTML = strlen(strip_tags($billet->texte()));
							if ($billetTextNoHTML <= 700) {
								echo("<p>". $billetWhithHTML ."</p>");
							} 
							else{
								echo substr($billetWhithHTML, 0, 700) ?> <a href="#">afficher la suite ...</a></br> <?php 
							}
						?>
						</div>
						
						<div class="imgBillet">
							<?php if (!empty($billet->image())) {
								echo '<img src="public/images/'.$billet->image().'">';
							}  ?>
						</div>
						<div class="blocBtnBillet">
							<form method="POST" action="index.php">
								<input type="hidden" name="action" value="delete">
								<input type="hidden" name="idbillet" value="<?php echo $billet->id(); ?>">
								<input type="submit" value="supprimer">
							</form>
							<form method="POST" action="index.php">
								<input type="hidden" name="action" value="edit">
								<input type="hidden" name="idbillet" value="<?php echo $billet->id(); ?>">
								<input type="submit" value="modifier">
							</form>
						</div>
					</div></br>
			<?php } ?>
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
    <script src="../public/styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/styles/js/js_back/custom.js"></script>

  </body>
</html>

<!-- ------------------------------------------------------- -->