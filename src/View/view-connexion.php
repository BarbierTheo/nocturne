<?php include_once "../../templates/head.php" ?>



<div class="fullscreen">
    <a href="controller-index.php" class="text-center h1 secret-sauce mb-4 text-decoration-none">Nocturne.</a>
    <form method="post" class="minform">
        <div class="mb-3">
            <label for="username" class="form-label">Pseudo:</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Entrer votre pseudo" required>
            <small class="text-danger"><?= $errors['username'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe"
                required>
            <small class="text-danger"><?= $errors['password'] ?? "" ?></small>
        </div>

        <small class="text-danger"><?= $errors['connexion'] ?? "" ?></small>
        <button type="submit" class="btn btn-secondary w-100">Se connecter</button>
    </form>
    <p class="text-center mt-3">
        <a href="controller-inscription.php" class="text-light">S'inscrire</a>
    </p>
</div>



<?php include_once "../../templates/footer.php" ?>