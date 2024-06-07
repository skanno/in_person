<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLink $serviceLink
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Service Link'), ['action' => 'edit', $serviceLink->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Service Link'), ['action' => 'delete', $serviceLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLink->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Service Links'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Service Link'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="serviceLinks view large-9 medium-8 columns content">
    <h3><?= h($serviceLink->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Person') ?></th>
                <td><?= $serviceLink->hasValue('person') ? $this->Html->link($serviceLink->person->internal_id, ['controller' => 'Persons', 'action' => 'view', $serviceLink->person->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Service') ?></th>
                <td><?= $serviceLink->hasValue('service') ? $this->Html->link($serviceLink->service->name, ['controller' => 'Services', 'action' => 'view', $serviceLink->service->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($serviceLink->id) ?></td>
            </tr>
        </table>
    </div>
</div>
