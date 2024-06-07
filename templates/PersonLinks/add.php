<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonLink $personLink
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Person Links'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="personLinks form content">
    <?= $this->Form->create($personLink) ?>
    <fieldset>
        <legend><?= __('Add Person Link') ?></legend>
        <?php
            echo $this->Form->control('from_person_id');
            echo $this->Form->control('to_person_id', ['options' => $persons]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
