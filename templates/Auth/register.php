
<?= $this->Form->create(null, ['id' => 'create_account_form']); ?>
    <?= $this->Form->control('name', ['class' => 'required', 'label' => 'Nome']); ?>
    <?= $this->Form->control('email', ['class' => 'required email', 'default' => $email ]); ?>
    <?= $this->Form->control('password', ['class' => 'required', 'label' => 'Senha']); ?>
    <?= $this->Form->control('confirm_password', ['class' => 'required same', 'label' => 'Confirmar Senha', 'type' => 'password', 'reference' => 'password']); ?>
    <?= $this->Form->submit('Criar Conta'); ?>
<?= $this->Form->end(); ?>


<!-- Quando Carregar o Conteudo do DOm ele adicionara a validação via Javascript no Formulario -->
<?= $this->Html->script('forms/validateForm', ['block' => true]); ?>
<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        validateForm('create_account_form')
    })
</script>

