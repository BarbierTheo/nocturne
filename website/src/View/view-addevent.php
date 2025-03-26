<?php include_once "../../templates/head.php" ?>
<?php include_once "../../templates/navbar.php" ?>

<!-- Add Event Form -->
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="mb-4">Ajouter un événement</h2>

            <form>
                <!-- Nom de l'événement -->
                <div class="mb-3">
                    <label class="form-label">Nom de l'événement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required>
                    <small class="text-danger">test</small>
                </div>


                <!-- Nom de l'événement -->
                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Genre de l'évènement</label>
                    <input class="form-control bg-dark text-light border-secondary" list="tagsList" id="tags">
                    <datalist id="tagsList">
                        <?php foreach (Events::showAllTags() as $value) { ?>
                            <option value="<?= $value['tag'] ?>">
                            <?php  } ?>
                    </datalist>
                </div>


                <div class="d-flex justify-content-between gap-2">

                    <!-- Date -->
                    <div class="mb-3 w-50">
                        <label class="form-label">Date de l'évènement</label>
                        <input type="date" class="form-control bg-dark text-light border-secondary" required>
                    </div>

                    <!-- Heure -->
                    <div class="mb-3 w-50">
                        <label class="form-label">Heure de l'évènement</label>
                        <input type="time" class="form-control bg-dark text-light border-secondary" required>
                    </div>
                    
                </div>
                <!-- Lieux -->
                <div class="mb-3">
                    <label class="form-label">Lieu de l'évènement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required>
                </div>

                <!-- Prix -->
                <div class="mb-3">
                    <label class="form-label">Prix de l'évènement (€)</label>
                    <input class="form-control bg-dark text-light border-secondary">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description de l'évènement</label>
                    <textarea class="form-control bg-dark text-light border-secondary" required></textarea>
                </div>

                <!-- Emplacement de l'évènement -->
                <div class="mb-3">
                    <label class="form-label">Emplacement de l'évènement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required>
                </div>

                <!-- Adresse exact -->
                <div class="mb-3">
                    <label class="form-label">Adresse exacte de l'évènement</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" required>
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


<?php include_once "../../templates/footer.php" ?>