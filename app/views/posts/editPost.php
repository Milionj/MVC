<?php require APPROOT . '/views/inc/header.php'; ?>

<form action="<?= URLROOT; ?>/posts/editPost/<?= $data['post']->id; ?>" method="POST">
    <div class="mb-3">
    
      <label for="exampleFormControlInput1" class="form-label">Titre</label>
    
      <input value="<?= $data['post']->title; ?>" type="text" class="form-control <?= empty($data['title_error']) ? '' : 'is-invalid' ?>" id="exampleFormControlInput1" placeholder="titre" name="postTitle">
    
      <span class="invalid-feedback"><?= $data['title_error'] ?></span>
    </div>
    
    <div class="mb-3">
    
      <label for="exampleFormControlTextarea1" class="form-label">Contenu</label>
    
      <textarea class="form-control <?= empty($data['content_error']) ? '' : 'is-invalid' ?>" id="exampleFormControlTextarea1" rows="3" name="postContent"><?= $data['post']->content; ?></textarea>
    
      <span class="invalid-feedback"><?= $data['content_error'] ?></span>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Modifier</button>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>