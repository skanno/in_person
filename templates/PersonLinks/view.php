<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonLink $personLink
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person Link'), ['action' => 'edit', $personLink->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person Link'), ['action' => 'delete', $personLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personLink->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Person Links'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person Link'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="personLinks view content">
            <h3><?= h($personLink->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $personLink->hasValue('person') ? $this->Html->link($personLink->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $personLink->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($personLink->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('From Person Id') ?></th>
                    <td><?= $this->Number->format($personLink->from_person_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($personLink->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
