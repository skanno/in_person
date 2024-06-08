<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Person> $persons
 */
?>
<div class="persons index content">
    <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Persons') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('internal_id') ?></th>
                    <th><?= $this->Paginator->sort('second_name') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('is_confirm_email') ?></th>
                    <th><?= $this->Paginator->sort('nick_name') ?></th>
                    <th><?= $this->Paginator->sort('gender_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person) : ?>
                <tr>
                    <td><?= $this->Number->format($person->id) ?></td>
                    <td><?= h($person->internal_id) ?></td>
                    <td><?= h($person->second_name) ?></td>
                    <td><?= h($person->first_name) ?></td>
                    <td><?= h($person->email) ?></td>
                    <td><?= h($person->is_confirm_email) ?></td>
                    <td><?= h($person->nick_name) ?></td>
                    <td>
                        <?= $person->hasValue('gender') ? $this->Html->link($person->gender->name, [
                            'controller' => 'Genders',
                            'action' => 'view',
                            $person->gender->id,
                        ]) : '' ?>
                    </td>
                    <td><?= h($person->created) ?></td>
                    <td><?= h($person->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'persons', 'action' => 'view', $person->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $person->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $person->id),
                        ]) ?>
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
        <p>
            <?= $this->Paginator->counter(
                __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')
            ) ?>
        </p>
    </div>
</div>
