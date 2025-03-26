<?php include_once "templates/head.php" ?>
<?php include_once "templates/navbar.php" ?>

<!-- Hero Section (Desktop Only) -->
<div class="p-5 text-center bg-secondary rounded-3 d-none d-md-block">
    <div class="d-flex justify-content-center align-items-center">
        <div class="text-light">
            <h1 class="mb-3">Mais keskispass au Havre ?</h1>
            <h2 class="mb-3 h4">Découvrez les événements du Havre</h2>
            <a class="btn btn-outline-light btn-lg" href="#" role="button">Explorer</a>
        </div>
    </div>
</div>

<!-- Posts -->
<div class="container my-4 text-light">
    <h3>Prochains évènements au Havre</h3>
    <hr>
    <div class="row justify-content-center">

        <?php foreach (Events::showEvents(6) as $value) { ?>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card bg-dark text-light">
                    <div class="position-relative">
                        <img src="../../assets/img/cem-on-fest-vol.3-evenement-facebook-v1-full-e1645529861990.jpg" alt="" class="rounded-3 w-100">
                        <span class="badge text-bg-primary rounded-pill position-absolute top-0 end-0 m-2"><?= Participate::countParticipants($value['event_id']) ?> participant.e.s</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-text h4"><b><?= $value['event_name'] ?></b></p>
                            <p class="card-text h4"><?= $value['event_price'] ?> €</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text"><?= $value['event_date'] ?></p>
                            <p class="card-text"><?= $value['event_emplacement'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

<?php include_once "templates/footer.php" ?>