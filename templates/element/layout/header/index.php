<aside class="bg-dark navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">NotesGo</a>
        <nav>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row gap-3 ">
                <li class="nav-item ">
                    <?= $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'index'], ['class' => 'text-white nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Postagens', ['controller' => 'Post', 'action' => 'index'], ['class' => 'text-white nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Perfis', ['controller' => 'User', 'action' => 'profile'],['class' => 'text-white nav-link']); ?>
                </li>
            </ul>
        </nav>
    </div>
</aside>
