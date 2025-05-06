
<?= $this->Form->create() ?>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->control('confirm_password') ?>
    <?= $this->Form->submit('Criar Conta') ?>
<?= $this->Form->end() ?>
