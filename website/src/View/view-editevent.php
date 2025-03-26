<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>

<!-- Modification Form -->
<div class="container my-4 pb-5 pb-md-0">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h3 class="mb-4">Modifier l'événement</h3>

            <!-- Current Image Preview -->
            <div class="mb-4 text-center">
                <img src="../../assets/img/eventimg/<?= $event['event_img'] ?>" class="img-fluid rounded-3 mb-2" style="max-height: 300px;" alt="Image actuelle">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-light btn-sm me-2">
                        <i class="bi bi-arrow-counterclockwise"></i> Rétablir
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label class="form-label">Changer l'image</label>
                <input type="file" class="form-control bg-dark text-light border-secondary">
            </div>

            <!-- Event Name -->
            <div class="mb-3">
                <label class="form-label">Nom de l'événement</label>
                <input type="text" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_name'] ?>">
            </div>

            <!-- Date and Time -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_date'] ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Heure</label>
                    <input type="time" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_hour'] ?>">
                </div>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label class="form-label">Lieu</label>
                <input type="text" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_emplacement'] ?>">
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input type="text" class="form-control bg-dark text-light border-secondary" value="<?= $event['event_adress'] ?>">
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label class="form-label">Prix (€)</label>
                <input class="form-control bg-dark text-light border-secondary" value="<?= $event['event_price'] ?>">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control bg-dark text-light border-secondary" rows="4"><?= $event['event_description'] ?></textarea>
            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label class="form-label">Tags (séparés par des virgules)</label>
                <input type="text" class="form-control bg-dark text-light border-secondary" value="soiree, havre, musique, nocturne">
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
                <a href="<?= $_SERVER['HTTP_REFERER'] ?? "controller-index.php" ?>" class="btn btn-outline-light">
                    <i class="bi bi-x-lg"></i> Annuler
                </a>
                <button class="btn btn-outline-primary">
                    <i class="bi bi-check-lg"></i> Enregistrer
                </button>
            </div>
        </div>
    </div>
</div>


<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>