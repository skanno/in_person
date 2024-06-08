<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gender'), ['action' => 'edit', $gender->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gender'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Genders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gender'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="genders view content">
            <h3><?= h($gender->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($gender->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gender->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Persons') ?></h4>
                <?php if (!empty($gender->persons)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Internal Id') ?></th>
                            <th><?= __('Second Name') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Is Confirm Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Nick Name') ?></th>
                            <th><?= __('Gender Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($gender->persons as $person) : ?>
                        <tr>
                            <td><?= h($person->id) ?></td>
                            <td><?= h($person->internal_id) ?></td>
                            <td><?= h($person->second_name) ?></td>
                            <td><?= h($person->first_name) ?></td>
                            <td><?= h($person->email) ?></td>
                            <td><?= h($person->is_confirm_email) ?></td>
                            <td><?= h($person->password) ?></td>
                            <td><?= h($person->nick_name) ?></td>
                            <td><?= h($person->gender_id) ?></td>
                            <td><?= h($person->created) ?></td>
                            <td><?= h($person->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Persons', 'action' => 'view', $person->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Persons', 'action' => 'edit', $person->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Persons', 'action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
