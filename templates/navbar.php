 <!-- Mobile Header (Logo + Icons) -->
 <div class="container-fluid py-3 d-md-none sticky-top">
     <div class="d-flex align-items-center">
         <!-- Logo -->
         <div class="col-4">
             <a href="controller-index.php" class="mb-0 text-decoration-none h1 secret-sauce">Nocturne.</a>
         </div>
         <!-- Top-Right Favorite Icon -->
         <?php if (!empty($_SESSION)) { ?>
             <div class="col-8 text-end">
                 <button class="btn btn-outline-light"><i class="bi bi-heart"></i></button>
                 <a class="btn btn-outline-light" href="controller-addevent.php"><i class="bi bi-calendar-plus"></i></a>
                 <a href="controller-deconnexion.php" class="btn btn-outline-danger"><i class="bi bi-person-x"></i></a>
             </div>
         <?php } else { ?>
             <div class="col-8 text-end">
                 <a href="controller-connexion.php" class="btn btn-outline-light rounded-pill secret-sauce">Connexion</a>
             </div>
         <?php } ?>
     </div>
 </div>


 <div class="container-fluid d-none d-md-block py-3 sticky-top">
     <div class="d-flex align-items-center justify-content-between">
         <!-- Logo -->
         <div class="">
             <a href="controller-index.php" class="mb-0 text-decoration-none h2 secret-sauce">Nocturne.</a>
         </div>
         <!-- Top-Right Favorite Icon -->
         <div class="d-flex gap-2 justify-content-end align-items-center">
             <?php if (!empty($_SESSION)) { ?>
                 <a class="btn btn-outline-light border-0 rounded-pill fw-semibold syne" href="controller-search.php"><i class="bi bi-search m-2"></i>Rechercher</a>
                 <a class="btn btn-outline-light border-0 rounded-pill fw-semibold syne"><i class="bi bi-heart m-2"></i>Favoris</a>
                 <a class="btn btn-outline-light border-0 rounded-pill fw-semibold syne" href="controller-addevent.php"><i class="bi bi-calendar-plus m-2"></i>Ajouter un évènement</a>
                 <a class="btn btn-outline-danger rounded-pill syne" href="controller-deconnexion.php">Se déconnecter</a>
             <?php } else { ?>
                 <a class="btn btn-outline-light rounded-pill syne" href="controller-inscription.php">Créer un compte</a>
                 <a class="btn btn-outline-light rounded-pill syne" href="controller-connexion.php">Se connecter</a>
             <?php } ?>
         </div>
     </div>
 </div>

 <!-- Mobile Bottom Sidebar -->
 <?php if (!empty($_SESSION)) { ?>
     <nav class="navbar fixed-bottom bg-dark d-md-none">
         <div class="container-fluid justify-content-around">
             <a href="controller-index.php" class="nav-link text-light"><i class="bi bi-house-door fs-3"></i></a> <!-- Home Icon -->
             <a href="controller-search.php" class="nav-link text-light"><i class="bi bi-search fs-3"></i></a> <!-- Search Icon -->
             <a href="#" class="nav-link text-light"><i class="bi bi-person fs-3"></i></a> <!-- Profile Icon -->
         </div>
     </nav>
 <?php } ?>