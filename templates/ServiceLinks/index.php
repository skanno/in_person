<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ServiceLink> $serviceLinks
 */
?>
<div class="serviceLinks index content">
    <?= $this->Html->link(__('New Service Link'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Service Links') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('service_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($serviceLinks as $serviceLink): ?>
                <tr>
                    <td><?= $this->Number->format($serviceLink->id) ?></td>
                    <td><?= $serviceLink->hasValue('person') ? $this->Html->link($serviceLink->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $serviceLink->person->id]) : '' ?></td>
                    <td><?= $serviceLink->hasValue('service') ? $this->Html->link($serviceLink->service->name, ['controller' => 'Services', 'action' => 'view', $serviceLink->service->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $serviceLink->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceLink->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLink->id)]) ?>
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
