<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Movimentation> $movimentations
 */
?>
<div class="movimentations index content">
    <?= $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Movimentação') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Código') ?></th>
                    <th><?= $this->Paginator->sort('Tipo') ?></th>
                    <th><?= $this->Paginator->sort('Valor') ?></th>
                    <th><?= $this->Paginator->sort('Data') ?></th>
                    <th><?= $this->Paginator->sort('Usuário') ?></th>
                    <th class="actions"><?= __('') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movimentations as $movimentation): ?>
                <tr>
                    <td><?= $this->Number->format($movimentation->id) ?></td>
                    <td> <?php
                        // Exibe "Entrada" se type == 0, ou "Saída" se type == 1
                        echo $movimentation->type == 0 ? 'Saída' : 'Entrada';
                        ?></td>
                    <td><?= $this->Number->currency($movimentation->value, 'BRL') ?></td>
                    <td><?= $this->Time->format($movimentation->created, 'dd/MM/yyyy HH:mm') ?> </td>
                    <td><?= $movimentation->has('user') ? $this->Html->link($movimentation->user->name, ['controller' => 'Users', 'action' => 'view', $movimentation->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $movimentation->id]) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $movimentation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movimentation->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
