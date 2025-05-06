<div class="step-1">
    <?= $this->Form->create() ?>
        <h3>Insira teu email</h3>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->submit('Enviar Código') ?>
    <?= $this->Form->end() ?>
</div>
<div class="step-2">
    <?= $this->Form->create() ?>
        <h3>Um codigo foi enviado a seu Email</h3>
        <?= $this->Form->control('code') ?>
        <?= $this->Form->submit('Verificar Código') ?>
    <?= $this->Form->end() ?>
</div>
