<?php include_once "../../templates/head.php" ?>



<div class="col-md-5 mx-auto mt-5 p-4 ">
    <h2 class="text-center mb-3 display-5 text-light">Nocturne</h2>
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label text-light">Pseudo:</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Entrer votre pseudo" required>
            <small class="text-danger"><?= $errors['username'] ?? "" ?></small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-light">Mot de passe:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe"
                required>
            <small class="text-danger"><?= $errors['password'] ?? "" ?></small>
        </div>

        <small class="text-danger"><?= $errors['connexion'] ?? "" ?></small>
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
    <p class="text-center mt-3">
        <a href="#" class="text-light">S'inscrire</a>
    </p>
</div>



<?php include_once "../../templates/footer.php" ?>