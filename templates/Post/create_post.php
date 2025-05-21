<?= $this->Form->create(null, ['id' => 'create_post_form', 'action' => 'create']); ?>
    <?= $this->Form->control('title', ['label' => 'Titulo', 'class' => 'required']); ?>
    <?= $this->Form->control('subtitle', ['label' => 'Sub-Titulo']); ?>
    <?= $this->Form->control('content', ['label' => 'Conteudo', 'class' => 'required']); ?>
    <?= $this->Form->submit() ?>
<?= $this->Form->end(); ?>

<?= $this->Html->script('forms/validateForm', ['block' => true]); ?>
<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        validateForm('create_post_form')
    })
</script>

