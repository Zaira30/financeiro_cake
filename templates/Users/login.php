<div class="login-container">
    <div class="users form">
        <?= $this->Flash->render() ?>
        <h3>Login</h3>
        <?= $this->Form->create() ?>
        <fieldset>
            <?= $this->Form->control('username', ['label' => 'Nome', 'required' => true]) ?>
            <?= $this->Form->control('password', ['label' => 'Senha', 'required' => true]) ?>
        </fieldset>
        <?= $this->Form->submit(__('Login')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
