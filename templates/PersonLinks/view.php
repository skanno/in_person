<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonLink $personLink
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Person Link'), ['action' => 'edit', $personLink->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Person Link'), ['action' => 'delete', $personLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personLink->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Person Links'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Person Link'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="personLinks view large-9 medium-8 columns content">
    <h3><?= h($personLink->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Person') ?></th>
                <td><?= $personLink->hasValue('person') ? $this->Html->link($personLink->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $personLink->person->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($personLink->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('From Person Id') ?></th>
                <td><?= $this->Number->format($personLink->from_person_id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($personLink->created) ?></td>
            </tr>
        </table>
    </div>
</div>
