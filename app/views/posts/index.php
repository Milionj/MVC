<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Liste des posts</h1>
<a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary">Ajouter un post</a>
<div class="row">
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="card m-1 col-md-3">

            <div class="card-body">

                <h5 class="card-title"><?= htmlspecialchars($post->title); ?></h5>

                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id || isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                    <a href="<?= URLROOT; ?>/posts/deletePost/<?= htmlspecialchars($post->id); ?>" class="btn btn-danger delete" title="Supprimer"><i class="bi bi-trash"></i></a>
                    <a href="<?php echo URLROOT; ?>/posts/editPost/<?= htmlspecialchars($post->id); ?>" class="btn btn-secondary edit" title="Modifier"><i class="bi bi-pencil-square"></i></a>
                <?php endif; ?>
                <h6 class="card-date">Publié par : <?= $post->name; ?> le <?= date('d/m/Y à H:i:s', strtotime($post->date)); ?></h6>

                <p class="card-text"><?= htmlspecialchars($post->content); ?></p>

                <a href="<?php echo URLROOT; ?>/posts/postDetail/<?= htmlspecialchars($post->id); ?>" class="btn btn-primary">Voir plus</a>

            </div>

        </div>
    <?php endforeach; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>