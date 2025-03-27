<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>



<!-- Profile Content -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <!-- User Info -->
            <div class="text-center mb-4">
                <p class="mb-1 fs-3 secret-sauce"><?= $profile['user_firstname'] . " " . $profile['user_lastname'] ?></p>
                <p class="mb-2">@<?= $profile['user_pseudo'] ?></p>
                <div class="d-flex justify-content-center gap-3">
                    <p class="fs-6 mb-0"><span class="fw-bold"><?= Users::countCreate($_SESSION['user_id']) ?></span> Événements créé(s)</p>
                    <p class="fs-6 mb-0"><a href="" class="text-light text-decoration-none"><span class="fw-bold"><?= Users::countParticipate($_SESSION['user_id']) ?></span> Favoris</a></p>
                </div>
                <button class="btn btn-outline-light mt-3">Modifier le profil</button>
            </div>

            <!-- User's Events Title -->
             <?php if(Users::countCreate($_SESSION['user_id']) != 0){ ?>
            <p class="fs-4 mb-3 secret-sauce">Mes événements</p>
                <?php } ?>
            <!-- User's Events -->
            <div class="row justify-content-center empty">

<?php foreach ($events as $value) { ?>

                <!-- Event 1 -->
                <div class="col-12 mb-3">
                    <a href="controller-event.php?event=<?= $value['event_id'] ?>" class="text-decoration-none text-light">
                        <div class="card bg-dark text-light border-secondary p-2">
                            <div class="row g-0 align-items-center">
                                <div class="col-4">
                                    <img src="../../assets/img/eventimg/<?= $value['event_img'] ?>" class="img-fluid rounded" alt="Soirée Nocturne">
                                </div>
                                <div class="col-8 ps-3">
                                    <p class="card-title mb-1 fw-bold secret-sauce"><?= $value['event_name'] ?></p>
                                    <p class="fs-6 mb-0 d-block"><i class="bi bi-calendar-event"></i> <?= $value['event_date'] . " " . $value['event_hour'] ?></p>
                                    <p class="fs-6 mb-0 d-block"><i class="bi bi-geo-alt"></i><?= $value['event_emplacement'] ?></p>
                                    <p class="fs-6 mb-0 d-block"><i class="bi bi-tag"></i><?= $value['event_price'] != 0 ? $value['event_price'] . " €" : "Gratuit" ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

<?php } ?>
                
            </div>
        </div>
    </div>
</div>









<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>