<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movimentation $movimentation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Movimentation'), ['action' => 'edit', $movimentation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Movimentation'), ['action' => 'delete', $movimentation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movimentation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Movimentations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Movimentation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="movimentations view content">
            <h3><?= h($movimentation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $movimentation->has('user') ? $this->Html->link($movimentation->user->name, ['controller' => 'Users', 'action' => 'view', $movimentation->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($movimentation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $this->Number->format($movimentation->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($movimentation->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($movimentation->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descriptions') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($movimentation->descriptions)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
