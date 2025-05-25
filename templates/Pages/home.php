
<?php if(empty($random_posts)): ?>
    <h1>Esta é uma aplicação de Exploração do Cakephp</h1>
    <p>Esta aplicação é um CRUD com validação Javascript de Formularios por meio de classes html</p>
    <div>
        <h3>Tecnologias Utilizadas</h3>
        <ul>
            <li>Cakephp</li>
            <li>PHP</li>
            <li>Javascript</li>
            <li>Jquery</li>
            <li>Mysql</li>
            <li>Sass</li>
            <li>Bootstrap</li>
            <li>HTML</li>
            <li>CSS</li>
        </ul>
    </div>
    <div>
        <h3>Funcionalidades Implementadas:</h3>
        <ul>
            <li>Criação de Postagens e Usuarios</li>
            <li>Criação de Tabelas de Banco de Dados via Migration</li>
            <li>Busca de Registros do Banco de Dados</li>
            <li>Criação de Interfaces utilizando Bootstrap</li>
            <li>Validação de Formularios com Javascript/JQuery</li>
            <li>Compilação de Codigos em SASS para CSS</li>
        </ul>
    </div>
<?php else: ?>
    <div>
        <div>
            <h2 class="text-center">Descubra novos Conteudos!</h2>
            <div class="container-fluid">
                <?php foreach($random_posts as $post): ?>
                    <div class="me-4 card post mt-2">
                        <h4 class="card-title text-center"><?= h($post->title) ?></h4>
                        <div class="card-body">
                            <p><?= h($post->subtitle) ?></p>
                            <p class="card-text"><?= h($post->content) ?></p>
                        </div>
                        <div class="text-muted card-footer">
                            Criado em: <?= $post->created->format('d/m/Y H:i') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
<?php endif ?>
