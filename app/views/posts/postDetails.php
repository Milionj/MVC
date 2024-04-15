<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?= htmlspecialchars($data['onePost']->title); ?></h5>
    <h6 class='card-date'>
      Publié par :
      <?= htmlspecialchars($data['onePost']->userName) ?>
      Le
      <?= date('d/m/Y à H:i', strtotime($data['onePost']->date_posted)); ?></h6>
    <p class="card-text"><?= htmlspecialchars($data['onePost']->content); ?></p>
  </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>