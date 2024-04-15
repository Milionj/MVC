<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="card m-1">

    <div class="card-body">

        <h5 class="card-title"><?= $data['post']->title; ?></h5>
        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['post']->user_id || isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
            <a href="<?= URLROOT;?>/posts/deletePost/<?= htmlspecialchars($data['post']->id); ?>" class="btn btn-danger delete" title="Supprimer"><i class="bi bi-trash"></i></a>
            <a href="<?php echo URLROOT; ?>/posts/editPost/<?= htmlspecialchars($data['post']->id); ?>" class="btn btn-secondary edit" title="Modifier"><i class="bi bi-pencil-square"></i></a>
        <?php endif; ?>
        <h6 class="card-date">Publié par : <?= $data['post']->name; ?> le <?= date('d/m/Y à H:i:s', strtotime($data['post']->date)); ?></h6>

        <p class="card-text"><?= $data['post']->content; ?></p>


    </div>

    
</div>
<h2><?php echo count($data['comments']) ?> commentaires</h2>
<?php foreach ($data['comments'] as $data['comment']) : ?>
<div class="card">
<h6 class="card-date">Publié par : <?= $data['comment']->name; ?> le <?= date('d/m/Y à H:i:s', strtotime($data['comment']->date)); ?></h6>
<p><?= $data['comment']->content; ?></p>
</div>
<?php endforeach; ?>
<form action="<?= URLROOT; ?>/posts/addComment/<?= $data['post']->id; ?>" method="POST">
    <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" placeholder="commentaire"></textarea>
    <button type="submit" class="btn btn-primary">Commenter</button>
</form>


<?php

require APPROOT . '/views/inc/footer.php'; ?>