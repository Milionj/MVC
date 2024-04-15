<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <form action="<?= URLROOT; ?>/users/login" method="POST">


        <div class="mb-3">

            <label for="email" class="form-label">Email</label>

            <input type="email" class="form-control <?= empty($data['email_error']) ? '' : 'is-invalid' ?>" id="email" name="email">

            <span class="invalid-feedback"><?= $data['email_error'] ?></span>


        </div>

        <div class="mb-3">

            <label for="password" class="form-label">Mot de passe</label>

            <input type="password" class="form-control <?= empty($data['password_error']) ? '' : 'is-invalid' ?>" id="password" name="password">

            <span class="invalid-feedback"><?= $data['password_error'] ?></span>


        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>