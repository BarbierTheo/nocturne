<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>


<!-- Favorites Title -->
<div class="container mt-4">
    <p class="h3 secret-sauce">Vos événements favoris</p>
</div>

<!-- Favorites - Event Cards -->
<div class="container my-4">
    <div class="row justify-content-center empty">
        <?php foreach (Events::showEventsPerso($_SESSION['user_id']) as $value) {
            $event = Events::showEvent($value['event_id']);
        ?>

            <div class="col-12 mb-3">
                <div class="text-decoration-none text-light">
                    <div class="card bg-dark text-light border-secondary p-2">
                        <div class="row g-0 align-items-center">
                            <a href="controller-event.php?event=<?= $value['event_id'] ?>" class="col-4">
                                <img src="../../assets/img/eventimg/<?= $event['event_img'] ?>" class="img-fluid rounded" alt="Soirée Nocturne">
                            </a href="controller-event.php?event=<?= $value['event_id'] ?>">
                            <div class="col-8 ps-3 d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-title fw-bold secret-sauce my-0"><?= $event['event_name'] ?></p>

                                    <div class="m-2">
                                        <?php
                                        if (Participate::alreadyParticipate($value['event_id'], $_SESSION['user_id'])) { ?>
                                            <button class="btn btn-danger" data-like="<?= $value['event_id'] ?>">
                                                <i class="bi bi-heart-fill"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button class="btn btn-outline-danger" data-like="<?= $value['event_id'] ?>">
                                                <i class="bi bi-heart-fill"></i>
                                            </button>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                                <span class="text-light"><?= Participate::countParticipants($value['event_id']) ?> participant.e.s</span>
                                <small class="d-flex gap-2"><i class="bi bi-calendar-event"></i><?= $event['event_date'] . " - " . $event['event_hour'] ?></small>
                                <small class="d-flex gap-2"><i class="bi bi-geo-alt"></i><?= $event['event_emplacement'] ?></small>
                                <small class="d-flex gap-2"><i class="bi bi-tag"></i><?= $event['event_price'] != 0 ? $event['event_price'] . " €" : "Gratuit" ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>
</div>


<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>