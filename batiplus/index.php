<?php
  require('pages/config.php');
  if (isset($_POST['envoyer']))
  {
    $nom =trim( $_POST['nom']);
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $statut = $_POST['statut'];
    $objet = $_POST['objet'];
    $description = $_POST['description'];
      
    $errors=[];

    if (empty($nom) or empty($email) or empty($contact) or empty($statut) or empty($objet) or empty($description)){
      $errors['vide']="veuillez renseigner les champs";
    }

    if (empty($nom) || !preg_match('/^[a-zA-Z0-9_]+$/', $nom)) {
      $errors['nom']="saisi non valide";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email']="email non valide";
     }
    //  else{ 
    
    //   $req=$connection->prepare('SELECT * FROM users WHERE email=?');
    //   $req->execute([$email]);
    //   $users= $req->fecth();
    //   if ($users) {
    //     $errors['']="email existant"
    //   }
    
    if (empty($contact) || !preg_match('/^[a-zA-Z0-9_]+$/', $contact)) {  
    
    }

    if (empty($statut) || !preg_match('/^[a-zA-Z0-9_]+$/', $statut)) {
      
      $errors['statut']="saisi non valide";
    }
    if (empty($objet) || !preg_match('/^[a-zA-Z0-9_]+$/', $objet)) {
      
      $errors['objet']="de quoi avez-vous besoin?";
    }
    if (empty($description) || !preg_match('/^[a-zA-Z0-9_]+$/', $description)) {
      $errors['description']="j'aimerais avoir si possible une description";
    }

    if (empty($errors)){

    $req =$connection->prepare("INSERT INTO users(nom,email,contact,statut,objet,description) values(?,?,?,?,?,?)");
    $data=[$nom,$email,$contact,$statut,$objet,$description]; 
    $req->execute($data);
    $success='<div class="alert alert-success">
      votre requete a ete prise en compte vous serez repondu dans les plus brefs delais merci pour votre confiance
    </div>';
    }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
    <title>BATIPLUS</title>
    <link rel="stylesheet" href="bootstrap3/css/style.css">
</head>
<body> 


<!-- MENU DE NAVIGATION -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">BATIPLUS</a>
      <div clbass="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       
      </div>
      <div id="navbar2" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Accueil</a></li>
          <li><a href="#service">Services</a></li>
          <li><a href="#about">A propos</a></li>
          <li><a href="<button id="modalActivate" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalPreview">

</button>Contact</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

   

  <?php if(!empty($errors)) :?>
              <div class='alert alert-danger'>
                <h3>Aidez-nous a vous aider </h3>
                <?php foreach ($errors as $error) :?>
                  <ul>
                    <li>
                    <?= $error ;?>

                    </li>
                  </ul>
                <?= '<meta http-equiv="refresh" content="4;index.php">'?>                
                <?php endforeach;?>
              </div>
          <?php endif;?>
          
          <!-- succes -->

          <?php if(!empty($success)) :?>
              <?=$success;?>

                <?= '<meta http-equiv="refresh" content="4;index.php">'?>                

          <?php endif;?>


	<div class="row">
		<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="images/archi.jpg" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <h2>
                            	<span>Bienvenue sur <strong>BATIPLUS</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>nous vous mettons en relation avec les artisans</span>
                            </h3>
                            <br>
                            <div class="infos">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#about">Plus d'infos</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="images/arch.jpg" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Bienvenue sur <strong>BATIPLUS</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>nous vous mettons en relation avec les artisans</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#about">Plus d'infos</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="images/house.jpg" alt="Third slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Bienvenue sur <strong>BATIPLUS</strong></span>
                            </h2>
                            <br>
                            <h3>
                            	<span>nous vous mettons en relation avec les artisans</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="#about">Plus d'infos</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /carousel -->
    </div>
    
<!------ Include the above in your HEAD tag ---------->

<!-- SERVICES -->

<div class="how-section1" id="service">
                    <div class="row">
                        <div class="col-md-6 how-img">
                            <img src="images/man.jpg"  style="width: 100%; height:100%;" alt=""/>
                        </div>
                        <div class="col-md-6">
                            <h4>Trouver des architectes de renom</h4>
                                        <h4 class="subheading"><em>BatiPlus</em> est un excellent endroit pour trouver plus d'architectes, pour gérer et développer votre projet.</h4>
                        <p class="text-muted">Vous recherchez un architecte ou décorateur d'intérieur ?

Nous vous mettons en relation gratuitement avec le professionnel qui correspond le mieux à votre besoin : de l’architecte  au décorateur d’intérieur. Donnez du style à votre projet !</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Besoin d'un artisan plombier?</h4>
                                        <h4 class="subheading">Faire appel à  <em>BatiPlus</em> c’est l’assurance d’un plombier certifié, toujours au fait des nouveautés de son secteur.</h4>
                                        
                        </div>
                        <div class="col-md-6 how-img">
                            <img src="images/plomb.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 how-img">
                             <img src="images/menusier.jpg" class="rounded-circle img-fluid" alt=""/>
                        </div>
                        <div class="col-md-6">
                            <h4>Travailler avec des menuisiers qualifiés et certifiés.</h4>
                                        <h4 class="subheading">Vous avez un projet de menuiserie interieure ou exterieure? entreprise ou particulier<em>BatiPlus</em> vous met en relation gratuitement avec des menuisiers qualifies de votre region.</h4>
                                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Des electriciens competents</h4>
                                        <h4 class="subheading">pour tout projet d'electricite nous vous proposons jusqu'a 4 devis faits par des experts. </h4>
                                        
                        </div>
                        <div class="col-md-6 how-img">
                            <img src="images/woman.jpg" class="rounded-circle img-fluid" alt=""/>
                        </div>
                    </div>
                
<!-- A PROPOS -->
            <div class="border">
                <div id="about"><h2>A PROPOS</h2></div>
                <div class="row">
                <img src="images/images.jpg" class="col-sm-4" alt="A propos de BATIPLUS">
                <p class="col-sm-8">BatiPlus vous accompagne de A à Z dans votre projet d’aménagement et de rénovation.

Vous retrouverez sur ce site une nouvelle approche de l’habitat : durable, stylisé, sain et multi-confort.

Notre objectif :
vous donner la possibilité d’habiter vos rêves. 


Comment ?
En vous proposant des projets concrets, réalisés dans tout l’hexagone, menés par des architectes, des coachs travaux et des artisans sélectionnés avec soin. </p>
                </div>
            
            </div>
            <br>
            <br>
        <!-- CONTACT -->
              
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade right" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalPreviewLabel">contactez-nous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Default form contact -->
<div class="row">

  <form class="text-center border border-light p-5 form-group" action="" method="post" >

  <p class="h4 mb-4">Veuillez remplir ce formulaire</p>

  <!-- Name -->
  <input type="text" name="nom" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

  <br>

  <!-- Email -->
  <input type="email" name="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">
  <br>
  <!-- phone -->
  <input type="tel" name="contact" id="defaultContactFormtel" class="form-control mb-4" placeholder="tel">
  <br>

  <!-- statut -->

  <select  name="statut" class="form-control mb-4">
      <option value="" enabled>statut</option>
      <option value="entreprise" >entreprise</option>
      <option value="particulier">particulier</option>
  </select>
    <br>  
  <!-- Subject -->

  <select name="objet" class="form-control mb-4">
      <option value="" enabled>Que recherchez-vous?</option>
      <option value="Architectes" >Architectes</option>
      <option value="Plombiers">Plombiers</option>
      <option value="Menuisiers">Menuisiers</option>
      <option value="Decorateur d'interieur">Decorateur d'interieur</option>
  </select>
 
  <br>
  <label for="edit-details--IXuh-JC9fCk" class="control-label">Avez-vous des précisions à nous donner sur votre projet ?</label>
  <div class="form-textarea-wrapper">
    <textarea  name="description" data-drupal-selector="edit-details" class="form-textarea form-control resize-vertical" id="edit-details--IXuh-JC9fCk" name="details" rows="2" cols="60" ></textarea>
  </div>

  <br>

  <!-- Send button -->
  <button name="envoyer" class="btn btn-info btn-block" type="submit">ENVOYER</button>

  </form>
</div>
  <!-- Default form contact -->
 </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
  
      </div>
    </div>
  </div>
</div>
<!-- Modal -->



        <!-- fin CONTACT -->
<div class="row">
    <!-- Footer -->
<footer class="page-footer font-sm">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Grid row -->
  <div class="row" id="copyright">

    <!-- Grid column -->
    <div class="col-md-4 mx-auto">

      <!-- Content -->
      <a href="#carousel-example-generic"><h5 id="foo">BATIPLUS</h5></a>
     
    </div>
    <!-- Grid column -->

    

    <!-- Grid column -->
    <div class="col-md-8 mx-auto">

      <!-- Links -->
      

      <ul class="list-unstyled">
        <li style="text-transform:capitalize; font-family: serif; font-style:italic; font-size:25px;">
          <a href="#service">Services</a>
        </li>
        <li style="text-transform:capitalize; font-family: serif; font-style:italic; font-size:25px;">
          <a href="#modalactive">Contactez-nous</a>
        </li>
        <li style="text-transform:capitalize; font-family: serif; font-style:italic; font-size:25px;">
          <a href="#about">A propos</a>
        </li>
      </ul>

    </div>
    

  </div>
  <!-- Footer Links -->





  <!-- Copyright -->
  <div class="footer-copyright ">© 2019 Copyright:
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->
    </div>


       


   <script src="bootstrap3/js/jquery-3.4.0.js"></script>
   <script src="bootstrap3/js/bootstrap.min.js"></script>
  </div>
  </body>
</html>