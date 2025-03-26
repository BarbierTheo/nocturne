<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>


<!-- Search Results Title -->
<div class="container mt-4">
    <!-- <h3>Résultats pour "Nocturne"</h3>-->
    <span class="h3"><?= isset($_GET['event']) && !empty($_GET['event']) ? "Résultat pour '" . $_GET['event'] . "'" : "" ?></span>
</div>

<!-- Search Results - Event Cards -->
<div class="container my-4" style="min-height: 55vh;">
    <div class="row justify-content-center">

        <?php foreach ($searchPosts as $value) { ?>

            <div class="col-12 col-md-4 mb-4">
                <a href="controller-event.php?event=<?= $value['event_id'] ?>" class="card bg-dark text-light text-decoration-none">
                    <img src="../../assets/img/eventimg/<?= $value['event_img'] ?>" alt="" class="rounded-3 w-100 object-fit-cover">
                    <div class="card-body">
                        <p class="card-title h5"><?= $value['event_name'] ?></p>
                        <div class="d-flex justify-content-between">
                            <small><i class="bi bi-calendar-event"></i> <?= $value['event_date'] ?></small>
                            <small><i class="bi bi-geo-alt"></i> <?= $value['event_emplacement'] ?></small>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small><i class="bi bi-tag"></i> <?= $value['event_price'] != 0 ? $value['event_price'] . " €" : "Gratuit" ?></small>
                            <a href="#" class="btn btn-sm btn-outline-light">Voir détails</a>
                        </div>
                    </div>
                </a>
            </div>

        <?php } ?>

    </div>
</div>



<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>