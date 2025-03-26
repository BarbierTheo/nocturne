<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>

<!-- Modification Form -->
<div class="container my-4 pb-5 pb-md-0">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="d-flex justify-content-between mb-3">
                    <h3 class="secret-sauce">Modifier l'événement</h3>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaldelete">
                        <i class="bi bi-trash m-1"></i> Supprimer
                    </button>
                </div>
                <!-- Current Image Preview -->
                <div class="mb-4 text-center">
                    <img src="../../assets/img/eventimg/<?= $event['event_img'] ?>" class="img-fluid rounded-3 mb-2" style="max-height: 300px;" alt="Image actuelle">

                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label class="form-label">Changer l'image</label>
                    <input type="file" class="form-control bg-dark text-light border-secondary">
                </div>

                <!-- Event Name -->
                <div class="mb-3">
                    <label class="form-label">Nom de l'événement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_name'] ?>" name="name">
                    <small class="text-danger"><?= $errors['name'] ?? "" ?></small>
                </div>

                <!-- Genre de l'événement -->
                <div class="mb-3">
                    <label class="form-label">Genre de l'événement</label>
                    <select class="form-control bg-dark text-light border-secondary" required name="genre">
                        <?php foreach (Events::showAllGenres() as $value) { ?>
                            <option <?= $value['genre_id'] == $event['genre_id'] ? "selected" : "" ?> value="<?= $value['genre_id'] ?>"><?= $value['genre_name'] ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= $errors['genre'] ?? "" ?></small>
                </div>

                <!-- Date and Time -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_date'] ?>" name="date">
                        <small class="text-danger"><?= $errors['date'] ?? "" ?></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Heure</label>
                        <input type="time" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_hour'] ?>" name="hour">
                        <small class="text-danger"><?= $errors['hour'] ?? "" ?></small>
                    </div>
                </div>

                <!-- Location -->
                <div class="mb-3">
                    <label class="form-label">Lieu</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_emplacement'] ?>" name="emplacement">
                    <small class="text-danger"><?= $errors['emplacement'] ?? "" ?></small>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_adress'] ?>" name="adress">
                    <small class="text-danger"><?= $errors['adress'] ?? "" ?></small>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label">Prix (€)</label>
                    <input class="form-control bg-dark text-light border-secondary" value="<?= $event['event_price'] ?>" name="price">
                    <small class="text-danger"><?= $errors['price'] ?? "" ?></small>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control bg-dark text-light border-secondary" rows="4" name="description"><?= $event['event_description'] ?></textarea>
                    <small class="text-danger"><?= $errors['description'] ?? "" ?></small>
                </div>


                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?? "controller-index.php" ?>" class="btn btn-outline-light">
                        <i class="bi bi-x-lg"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-outline-success">
                        <i class="bi bi-check-lg"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body p-4">
                <span>Êtes-vous sûr de vouloir supprimer votre évènement ?</span>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="controller-deleteevent.php?event=<?= $event['event_id'] ?>" class="btn btn-danger">Supprimer l'évènement</a>
            </div>
        </div>
    </div>
</div>




<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>