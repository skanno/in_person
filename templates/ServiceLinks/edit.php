<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLink $serviceLink
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 * @var \App\Model\Entity\Service[]|\Cake\Collection\CollectionInterface $services
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLink->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Service Links'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="serviceLinks form content">
    <?= $this->Form->create($serviceLink) ?>
    <fieldset>
        <legend><?= __('Edit Service Link') ?></legend>
        <?php
            echo $this->Form->control('person_id', ['options' => $persons]);
            echo $this->Form->control('service_id', ['options' => $services]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
