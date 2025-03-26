<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>

<!-- Add Event Form -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="mb-4 secret-sauce">Ajouter un événement</h2>

            <form method="post" enctype="multipart/form-data" novalidate>
                <!-- Nom de l'événement -->
                <div class="mb-3">
                    <label class="form-label">Nom de l'événement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required name="name">
                    <small class="text-danger"><?= $errors['name'] ?? "" ?></small>
                </div>


                <!-- Genre de l'événement -->
                <div class="mb-3">
                    <label class="form-label">Genre de l'événement</label>
                    <select class="form-control bg-dark text-light border-secondary inter" required name="genre">
                        <option selected disabled value="0">Sélectionner le type d'évènement</option>
                        <?php foreach (Events::showAllGenres() as $value) { ?>
                            <option value="<?= $value['genre_id'] ?>"><?= $value['genre_name'] ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger"><?= $errors['genre'] ?? "" ?></small>
                </div>


                <div class="d-flex justify-content-between gap-2">

                    <!-- Date -->
                    <div class="mb-3 w-50">
                        <label class="form-label">Date de l'évènement</label>
                        <input type="date" class="form-control bg-dark text-light border-secondary" required name="date">
                        <small class="text-danger"><?= $errors['date'] ?? "" ?></small>
                    </div>

                    <!-- Heure -->
                    <div class="mb-3 w-50">
                        <label class="form-label">Heure de l'évènement</label>
                        <input type="time" class="form-control bg-dark text-light border-secondary" required name="hour">
                        <small class="text-danger"><?= $errors['hour'] ?? "" ?></small>
                    </div>

                </div>

                <!-- Prix -->
                <div class="mb-3">
                    <label class="form-label">Prix de l'évènement (€) - <span class="fw-light">laisser vide si gratuit</span></label>
                    <input class="form-control bg-dark text-light border-secondary" name="price">
                    <small class="text-danger"><?= $errors['price'] ?? "" ?></small>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description de l'évènement</label>
                    <textarea class="form-control bg-dark text-light border-secondary" required name="description"></textarea>
                    <small class="text-danger"><?= $errors['description'] ?? "" ?></small>
                </div>

                <!-- Emplacement de l'évènement -->
                <div class="mb-3">
                    <label class="form-label">Emplacement de l'évènement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required name="place">
                    <small class="text-danger"><?= $errors['place'] ?? "" ?></small>
                </div>

                <!-- Adresse exact -->
                <div class="mb-3">
                    <label class="form-label">Adresse exacte de l'évènement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required name="address">
                    <small class="text-danger"><?= $errors['address'] ?? "" ?></small>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image de l'évènement</label>
                    <input class="form-control bg-dark text-light border-secondary" type="file" id="formFile" name="image">
                    <small class="text-danger"><?= $errors['image'] ?? "" ?></small>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2 mt-4 mb-4 pb-4">
                    <button type="submit" class="btn btn-outline-light">
                        <i class="bi bi-plus-circle"></i> Publier l'événement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once "../../templates/visualfooter.php" ?>
<?php include_once "../../templates/footer.php" ?>