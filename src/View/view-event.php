<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>

<!-- Event Details Section -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <!-- Event Image -->
            <div class="mb-4 d-flex justify-content-center position-relative">
                <img src="../../assets/img/eventimg/<?= $event['event_img'] ?>" class="w-100 object-fit-cover rounded-3" alt="">
                
                <?php if (Participate::countParticipants($event['event_id']) >= 1) { ?>
                        <span class="badge text-bg-light rounded-pill position-absolute top-0 end-0 m-2"><?= Participate::countParticipants($event['event_id']) ?> participant.e.s</span>
                    <?php } ?>

                <div class="position-absolute top-0 start-0 m-2">
                <?php
                        if (!empty($_SESSION)) {
                            if ($event['user_id'] != $_SESSION['user_id']) {
                                if (Participate::alreadyParticipate($event['event_id'], $_SESSION['user_id'])) { ?>
                                    <button class="btn btn-danger" data-like="<?= $event['event_id'] ?>">
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                                <?php } else { ?>
                                    <button class="btn btn-outline-danger" data-like="<?= $event['event_id'] ?>">
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                        <?php }
                            }
                        } ?>
                </div>
            </div>

            <!-- Event Title -->
            <div class="d-flex justify-content-between my-2">
                <span class="h2 secret-sauce"><?= $event['event_name'] ?></span>
                <span class="fw-light fs-4 text-uppercase bg-light  py-2 px-2 text-dark"><?= $event['genre_name'] ?></span>
            </div>

            <!-- Event Meta -->
            <div class="d-flex flex-wrap gap-3 mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-calendar-event me-2"></i>
                    <span><?= $event['event_date'] ?> - <?= $event['event_hour'] ?></span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-geo-alt me-2"></i>
                    <span><?= $event['event_emplacement'] ?></span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-tag me-2"></i>
                    <span><?= $event['event_price'] != 0 ? $event['event_price'] . " €" : "Gratuit" ?></span>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <span class="h4 secret-sauce">Description</span>
                <p><?= $event['event_description'] ?></p>
            </div>


            <div class="mb-4">
                <span class="h4 secret-sauce d-flex">Adresse</span>
                <span><?= $event['event_adress'] ?></span>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between mt-4 pt-4">
                <a href="<?= $_SERVER['HTTP_REFERER'] ?? "controller-index.php" ?>" class="btn btn-outline-light">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
                <?php
                if (!empty($_SESSION)) {
                    if ($event['user_id'] == $_SESSION['user_id']) { ?>
                        <div>
                            <a href="controller-editevent.php?event=<?= $event['event_id'] ?>" class="btn btn-outline-warning">
                                <i class="bi bi-pencil"></i> Modifier
                            </a>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>








<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>