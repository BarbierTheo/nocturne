 <!-- Mobile Header (Logo + Icons) -->
 <div class="container-fluid py-3 d-md-none">
     <div class="row align-items-center">
         <!-- Logo -->
         <div class="col-6">
             <a href="controller-index.php" class="mb-0 text-decoration-none h1 secret-sauce">Nocturne</a>
         </div>
         <!-- Top-Right Favorite Icon -->
         <div class="col-6 text-end">
             <button class="btn btn-outline-light"><i class="bi bi-heart"></i></button>
         </div>
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
         <a class="btn btn-outline-light border-0 rounded-pill fw-semibold syne" href="controller-search.php"><i class="bi bi-search m-2"></i>Rechercher</a>
             <a class="btn btn-outline-light border-0 rounded-pill fw-semibold syne"><i class="bi bi-heart m-2"></i>Favoris</a>
             <a class="btn btn-outline-light border-0 rounded-pill fw-semibold syne"><i class="bi bi-person m-2"></i>Profil</a>
             <a class="btn btn-outline-danger rounded-pill syne" href="controller-deconnexion.php">Se déconnecter</a>
         </div>
     </div>
 </div>

 <!-- Mobile Bottom Sidebar -->
 <nav class="navbar fixed-bottom bg-dark d-md-none">
     <div class="container-fluid justify-content-around">
         <a href="#" class="nav-link text-light"><i class="bi bi-house-door fs-3"></i></a> <!-- Home Icon -->
         <a href="#" class="nav-link text-light"><i class="bi bi-search fs-3"></i></a> <!-- Search Icon -->
         <a href="#" class="nav-link text-light"><i class="bi bi-person fs-3"></i></a> <!-- Profile Icon -->
     </div>
 </nav>