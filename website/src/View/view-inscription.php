<?php include_once "../../templates/head.php" ?>



<div class="col-md-5 mx-auto mt-2 p-4">
    <h2 class="text-center mb-3 display-5 text-light">Inscription</h2>
    <form method="post">
        <div class="mb-3">
            <label for="lastname" class="form-label text-light">Nom:</label>
            <input type="text" name="firstname" class="form-control" id="lastname" placeholder="Entrez votre nom" required>
            <small class="text-danger"><?= $errors['firstname'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label text-light">Prénom:</label>
            <input type="text" name="lastname" class="form-control" id="name" placeholder="Entrez votre prénom" required>
            <small class="text-danger"><?= $errors['lastname'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label text-light">Pseudo:</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Entrez votre pseudo" required>
            <small class="text-danger"><?= $errors['pseudo'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label text-light">Mail:</label>
            <input type="mail" name="mail" class="form-control" id="mail" placeholder="Entrez votre adresse mail" required>

            <small class="text-danger"><?= $errors['mail'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-light">Mot de passe:</label>
            <input type="password" name="password1" class="form-control" id="password" placeholder="Entrez votre mot de passe"
                required>

            <small class="text-danger"><?= $errors['password1'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label text-light">Confirmation mot de passe:</label>
            <input type="password" name="password2" class="form-control" id="confirm-password"
                placeholder="Confirmez votre mot de passe" required>

            <small class="text-danger"><?= $errors['password2'] ?? "" ?></small>
        </div>
        <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
    </form>
    <p class="text-center mt-3">
        <a href="#" class="text-light">Déjà inscrit ? Se connecter</a>
    </p>
</div>






<?php include_once "../../templates/footer.php" ?>