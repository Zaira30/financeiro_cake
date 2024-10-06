<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movimentation $movimentation
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="movimentations form content">
            <?= $this->Form->create($movimentation) ?>
            <fieldset>
                <legend><?= __('Movimentação: Adicionar') ?></legend>
                <?php
                    echo $this->Form->control('descriptions', ['label' => 'Descrição']);
                    echo $this->Form->control('type', ['label' => 'Tipo', 'options' => $types]);
                    echo $this->Form->control('value', ['label' => 'Valor', 'id' => 'value-input', 'type' => 'text']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#value-input').mask('000.000.000,00', {reverse: true});
    });
</script>

