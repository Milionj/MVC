<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <form action="<?= URLROOT; ?>/users/register" method="POST">

        <div class="mb-3">

            <label for="name" class="form-label">Nom</label>

            <input type="text" class="form-control <?= empty($data['name_error']) ? '' : 'is-invalid' ?>" id="name" name="name">

            <span class="invalid-feedback"><?= $data['name_error'] ?></span>

        </div>

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

        <div class="mb-3">

            <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>

            <input type="password" class="form-control <?= empty($data['confirm_password_error']) ? '' : 'is-invalid' ?>" id="confirm_password" name="confirm_password">

            <span class="invalid-feedback"><?= $data['confirm_password_error'] ?></span>

        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>