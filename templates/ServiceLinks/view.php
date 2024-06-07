<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLink $serviceLink
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service Link'), ['action' => 'edit', $serviceLink->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service Link'), ['action' => 'delete', $serviceLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLink->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Service Links'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service Link'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="serviceLinks view content">
            <h3><?= h($serviceLink->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $serviceLink->hasValue('person') ? $this->Html->link($serviceLink->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $serviceLink->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= $serviceLink->hasValue('service') ? $this->Html->link($serviceLink->service->name, ['controller' => 'Services', 'action' => 'view', $serviceLink->service->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($serviceLink->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
