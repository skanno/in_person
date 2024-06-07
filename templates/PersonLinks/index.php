<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PersonLink> $personLinks
 */
?>
<div class="personLinks index content">
    <?= $this->Html->link(__('New Person Link'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Person Links') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('from_person_id') ?></th>
                    <th><?= $this->Paginator->sort('to_person_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personLinks as $personLink): ?>
                <tr>
                    <td><?= $this->Number->format($personLink->id) ?></td>
                    <td><?= $this->Number->format($personLink->from_person_id) ?></td>
                    <td><?= $personLink->hasValue('person') ? $this->Html->link($personLink->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $personLink->person->id]) : '' ?></td>
                    <td><?= h($personLink->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $personLink->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personLink->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personLink->id)]) ?>
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
