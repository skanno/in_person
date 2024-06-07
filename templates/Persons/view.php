<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Genders'), ['controller' => 'Genders', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Gender'), ['controller' => 'Genders', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Service Links'), ['controller' => 'ServiceLinks', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Service Link'), ['controller' => 'ServiceLinks', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="persons view large-9 medium-8 columns content">
    <h3><?= h($person->internal_id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Internal Id') ?></th>
                <td><?= h($person->internal_id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Second Name') ?></th>
                <td><?= h($person->second_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('First Name') ?></th>
                <td><?= h($person->first_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($person->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nick Name') ?></th>
                <td><?= h($person->nick_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Gender') ?></th>
                <td><?= $person->hasValue('gender') ? $this->Html->link($person->gender->name, ['controller' => 'Genders', 'action' => 'view', $person->gender->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($person->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($person->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($person->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Is Confirm Email') ?></th>
                <td><?= $person->is_confirm_email ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Service Links') ?></h4>
        <?php if (!empty($person->service_links)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Person Id') ?></th>
                    <th scope="col"><?= __('Service Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($person->service_links as $serviceLinks): ?>
                <tr>
                    <td><?= h($serviceLinks->id) ?></td>
                    <td><?= h($serviceLinks->person_id) ?></td>
                    <td><?= h($serviceLinks->service_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ServiceLinks', 'action' => 'view', $serviceLinks->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceLinks', 'action' => 'edit', $serviceLinks->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'ServiceLinks', 'action' => 'delete', $serviceLinks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLinks->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
