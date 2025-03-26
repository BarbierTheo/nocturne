<?php include_once "templates/head.php" ?>
<?php include_once "templates/navbar.php" ?>

<!-- Hero Section (Desktop Only) -->
<div class="p-5 text-center bg-secondary rounded-3 d-none d-md-block">
    <div class="d-flex justify-content-center align-items-center">
        <div class="text-light">
            <h1 class="mb-3">Mais keskispass au Havre ?</h1>
            <h2 class="mb-3 h4">Découvrez les événements du Havre</h2>
            <a href="controller-addevent.php" class="btn btn-outline-light btn-lg" href="#" role="button">Ajoute un évènement !</a>
        </div>
    </div>
</div>

<!-- Posts -->
<div class="container my-4 text-light">
    <h3>Prochains évènements au Havre</h3>
    <hr>
    <div class="row justify-content-center">

        <?php foreach (Events::showEvents(6) as $value) { ?>

            <a href="controller-event.php?event=<?= $value['event_id'] ?>" class="col-12 col-lg-4 mb-4 text-decoration-none">
                <div class="card bg-dark text-light">
                    <div class="position-relative h-75">
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
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-text h4"><b><?= $value['event_name'] ?></b></p>
                            <p class="card-text h4"><?= $value['event_price'] != 0 ? $value['event_price'] . " €" : "Gratuit" ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text"><?= $value['event_date'] ?></p>
                            <p class="card-text"><?= $value['event_emplacement'] ?></p>
                        </div>
                    </div>
                </div>
            </a>

        <?php } ?>

    </div>
</div>

<?php include_once "templates/visualfooter.php" ?>
<?php include_once "templates/footer.php" ?>