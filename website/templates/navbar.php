 <!-- Mobile Header (Logo + Icons) -->
 <div class="container-fluid py-3 d-md-none">
     <div class="row align-items-center">
         <!-- Logo -->
         <div class="col-6">
             <a href="controller-index.php" class="mb-0 text-decoration-none h4">Nocturne</a>
         </div>
         <!-- Top-Right Favorite Icon -->
         <div class="col-6 text-end">
             <button class="btn btn-outline-light"><i class="bi bi-heart"></i></button>
         </div>
     </div>
 </div>
 <div class="container-fluid d-none d-md-block py-3">
     <div class="row align-items-center">
         <!-- Logo -->
         <div class="col-md-4">
             <a href="controller-index.php" class="mb-0 text-decoration-none h4">Nocturne</a>
         </div>
         <!-- Search Bar -->
         <form class="col-md-4 d-flex gap-2" action="controller-search.php?" >
             <input type="text" class="form-control" placeholder="Rechercher un événement" name="event">
             <button class="px-3 btn btn-outline-light"><i class="bi bi-search"></i></button>
        </form>
         <!-- Top-Right Favorite Icon -->
         <div class="col-md-4 text-end">
             <a class="btn btn-outline-light"><i class="bi bi-heart"></i> Favoris</a>
             <a class="btn btn-outline-light"><i class="bi bi-person"></i> Profil</a>
             <a class="btn btn-outline-danger" href="controller-deconnexion.php"><i class="bi bi-person"></i> Se déconnecter</a>
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