<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TemporaryToken> $temporaryTokens
 */
?>
<div class="temporaryTokens index content">
    <?= $this->Html->link(__('New Temporary Token'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Temporary Tokens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($temporaryTokens as $temporaryToken): ?>
                <tr>
                    <td><?= $this->Number->format($temporaryToken->id) ?></td>
                    <td><?= $temporaryToken->hasValue('person') ? $this->Html->link($temporaryToken->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $temporaryToken->person->id]) : '' ?></td>
                    <td><?= h($temporaryToken->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $temporaryToken->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $temporaryToken->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $temporaryToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $temporaryToken->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
