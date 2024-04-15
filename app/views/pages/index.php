<?php require APPROOT . '/views/inc/header.php'; ?>

<h1><?= $data['title']; ?></h1>
<p><?= $data['content']; ?></p>

<a href="<?= URLROOT; ?>/pages/about" class="btn btn-primary">Voir plus</a>

<?php require APPROOT . '/views/inc/footer.php'; ?>