
<?= $this->Form->create() ?>
    <?= $this->Form->control('email', ['default' => $email]) ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->submit('Entrar') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Criar Novo Conta', ['controller' => 'Auth', 'action' => 'register']) ?>
<?= $this->Html->link('Esqueci Minha Senha', ['controller' => 'Auth', 'action' => 'forget_password']) ?>
