<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>


    <!-- Favorites Title -->
    <div class="container mt-4">
        <p class="h3">Vos événements favoris</p>
    </div>

    <!-- Favorites - Event Cards -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <!-- Event 1 -->
            <div class="col-12 col-md-4 mb-4">
                <a href="#" class="text-decoration-none text-light">
                    <div class="card bg-dark text-light border-secondary">
                        <img src="asset/img/coffee.jpg" class="card-img-top" alt="Soirée Nocturne">
                        <div class="card-body text-center py-2">
                            <p class="card-title h5 mb-1">Soirée Nocturne au Havre</p>
                            <small class="d-block"><i class="bi bi-calendar-event"></i> 28 Mars 2025</small>
                            <small class="d-block"><i class="bi bi-geo-alt"></i> Le Havre</small>
                            <small class="d-block"><i class="bi bi-tag"></i> Gratuit</small>
                        </div>
                    </div>
                </a>
                <div class="text-center mt-2">
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-heart-fill"></i>
                    </button>
                </div>
            </div>

            <!-- Event 2 -->
            <div class="col-12 col-md-4 mb-4">
                <a href="#" class="text-decoration-none text-light">
                    <div class="card bg-dark text-light border-secondary">
                        <img src="asset/img/coffee.jpg" class="card-img-top" alt="Soirée Nocturne">
                        <div class="card-body text-center py-2">
                            <p class="card-title h5 mb-1">Concert en Plein Air</p>
                            <small class="d-block"><i class="bi bi-calendar-event"></i> 30 Mars 2025</small>
                            <small class="d-block"><i class="bi bi-geo-alt"></i> Le Havre</small>
                            <small class="d-block"><i class="bi bi-tag"></i> 10€</small>
                        </div>
                    </div>
                </a>
                <div class="text-center mt-2">
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-heart-fill"></i>
                    </button>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="col-12 col-md-4 mb-4">
                <a href="#" class="text-decoration-none text-light">
                    <div class="card bg-dark text-light border-secondary">
                        <img src="asset/img/coffee.jpg" class="card-img-top" alt="Soirée Nocturne">
                        <div class="card-body text-center py-2">
                            <p class="card-title h5 mb-1">Expo Art Moderne</p>
                            <small class="d-block"><i class="bi bi-calendar-event"></i> 1 Avril 2025</small>
                            <small class="d-block"><i class="bi bi-geo-alt"></i> Le Havre</small>
                            <small class="d-block"><i class="bi bi-tag"></i> 5€</small>
                        </div>
                    </div>
                </a>
                <div class="text-center mt-2">
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-heart-fill"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>