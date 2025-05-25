<h2><?= $user->name ?></h2>
<p>Este Usuario tem <?= $posts_count ?> Postagens</p>

<div>
    <?php if(!empty($post)): ?>
        <h2>Postagem em Destaque:</h2>
        <div class="card shadow flex mb-4">
            <h3 class="text-center"><?= h($post->title) ?></h3>
            <div class="card-body">
                <p><?= h($post->subtitle) ?></p>
                <p><?= h($post->content) ?></p>
            </div>
            <div class="card-footer text-muted">
                Criado em: <?= $post->created->format('d/m/Y H:i') ?>
            </div>
        </div>
    <?php else: ?>
        <p>Este Usuario ainda não criou nenhuma Postagem</p>
    <?php endif ?>
</div>
