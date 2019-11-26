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
	                        <a href="controllers/deconnexion.php"> Déconnexion </a>
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
                    <li class="current"><a href="index.php?action=page_liste_billets"><i class="glyphicon glyphicon-book"></i> billets</a></li>
                    <li><a href="index.php?action=page_liste_commentaires"><i class="glyphicon glyphicon-envelope"></i> Commentaires</a></li>
                    <li><a href="index.php?action=page_publier_billet"><i class="glyphicon glyphicon-pencil"></i> Publier</a></li>
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Revenir sur le site</a></li>
                </ul>
             </div>
		   </div>
		<h2 class="titleH2">Billets</h2>    
		<div class="listBillets"> 
			<div class="billet">
				<?php
					echo "<h3 class='titreBillet'>".$billet->titre()."</h3>";
				?>
				<div class="textEtbtn">
					
				<?php
					if (!empty($billet->image())) {
						echo '<img src="public/images/'.$billet->image().'">';
					}  
					echo $billet->texte();
				?>
					<div class="blocBtnBillet">
						<form method="POST" action="index.php?action=supprimer_billet">
							<!-- <input type="hidden" name="action" value="delete"> -->
							<input type="hidden" name="idbillet" value="<?php echo $billet->id(); ?>">
							<input type="submit" class="submitDelete" value="supprimer">
						</form>
						<form method="POST" action="index.php?action=editer_billet">
							<!-- <input type="hidden" name="action" value="edit"> -->
							<input type="hidden" name="idbillet" value="<?php echo $billet->id(); ?>">
							<input type="submit" value="modifier">
						</form>
					</div>
				</div>
			</div></br>  
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