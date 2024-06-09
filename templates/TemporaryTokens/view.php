<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TemporaryToken $temporaryToken
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Temporary Token'), ['action' => 'edit', $temporaryToken->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Temporary Token'), ['action' => 'delete', $temporaryToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $temporaryToken->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Temporary Tokens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Temporary Token'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="temporaryTokens view content">
            <h3><?= h($temporaryToken->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $temporaryToken->hasValue('person') ? $this->Html->link($temporaryToken->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $temporaryToken->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($temporaryToken->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($temporaryToken->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
