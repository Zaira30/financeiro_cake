<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Usuário: Editar') ?></legend>
                <?php
                    echo $this->Form->control('username', ['label' => 'Nome do Usuário']);
                    echo $this->Form->control('password', ['label' => 'Senha']);
                    echo $this->Form->control('name', ['label' => 'Senha']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
