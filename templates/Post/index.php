
<?= $this->Html->link('Criar uma Postagem', ['action' => 'create_post'],['class' => 'btn btn-secondary m-2']); ?>
<?php if(empty($posts)): ?>

    <?php foreach ($posts as $post): ?>
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
    <?php endforeach; ?>

    <!-- Controles de Paginação -->
    <div class="paginator">
        <ul class="pagination ">
            <?= $this->Paginator->first('<< Início') ?>
            <?= $this->Paginator->prev('< Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Próximo >') ?>
            <?= $this->Paginator->last('Último >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}}')) ?></p>
    </div>

    <?= $this->Html->css('post/index') ?>
<?php else: ?>
    <p>Nenhuma Postagem foi Criada Ainda</p>
<?php endif; ?>

