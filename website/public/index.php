<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>

<!-- Hero Section (Desktop Only) -->
<div class="text-center d-none d-md-flex mx-auto" id="heroheader">
    <div class="d-flex justify-content-center align-items-center mx-auto">
        <div class="text-light">
            <h1 class="mb-3 secret-sauce">Mais keskispass au Havre ?</h1>
            <h2 class="mb-3 h4 fw-light">Découvrez les événements du Havre</h2>
            <a href="controller-addevent.php" class="btn btn-outline-light btn-lg" href="#" role="button">Ajoute un évènement !</a>
        </div>
    </div>
</div>

<!-- Posts -->
<div class="container my-4 text-light">
    <h3 class="secret-sauce">Prochains évènements au Havre</h3>
    <hr>
    <div class="row justify-content-center">

        <?php foreach (Events::showEvents(6) as $value) { ?>

            <div class="col-12 col-md-4 mb-4">
                <a href="controller-event.php?event=<?= $value['event_id'] ?>" class="bg-dark text-light text-decoration-none">
                <div class="position-relative">
                        <img src="../../assets/img/eventimg/<?= $value['event_img'] ?>" alt="" class="rounded-3 w-100 object-fit-cover">

                        <?php if (Participate::countParticipants($value['event_id']) >= 1) { ?>
                            <span class="badge text-bg-primary rounded-pill position-absolute top-0 end-0 m-2"><?= Participate::countParticipants($value['event_id']) ?> participant.e.s</span>
                        <?php } ?>

                        <?php if ($value['user_id'] != $_SESSION['user_id']) { 
                            if(Participate::alreadyParticipate($value['event_id'], $_SESSION['user_id'])) {
                            ?>
                            <button class="btn btn-danger position-absolute top-0 start-0 m-2">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-outline-danger position-absolute top-0 start-0 m-2">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        <?php } } ?>

                    </div>
                    <div class="mt-2">
                        <p class="h5 secret-sauce"><?= $value['event_name'] ?></p>
                        <div class="d-flex justify-content-between">
                            <small><i class="bi bi-calendar-event"></i> <?= $value['event_date'] ?></small>
                            <small><i class="bi bi-geo-alt"></i> <?= $value['event_emplacement'] ?></small>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small><i class="bi bi-tag"></i> <?= $value['event_price'] != 0 ? $value['event_price'] . " €" : "Gratuit" ?></small>
                            <a href="controller-event.php?event=<?= $value['event_id'] ?>" class="btn btn-sm btn-outline-light">Voir détails</a>
                        </div>
                    </div>
                </a>
            </div>

        <?php } ?>

    </div>
</div>

<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>