<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="persons view content">
            <h3><?= h($person->internal_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Internal Id') ?></th>
                    <td><?= h($person->internal_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Second Name') ?></th>
                    <td><?= h($person->second_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($person->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nick Name') ?></th>
                    <td><?= h($person->nick_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= $person->hasValue('gender') ? $this->Html->link($person->gender->name, ['controller' => 'Genders', 'action' => 'view', $person->gender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($person->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($person->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Confirm Email') ?></th>
                    <td><?= $person->is_confirm_email ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Service Links') ?></h4>
                <?php if (!empty($person->service_links)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th><?= __('Service Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->service_links as $serviceLink) : ?>
                        <tr>
                            <td><?= h($serviceLink->id) ?></td>
                            <td><?= h($serviceLink->person_id) ?></td>
                            <td><?= h($serviceLink->service_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ServiceLinks', 'action' => 'view', $serviceLink->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceLinks', 'action' => 'edit', $serviceLink->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServiceLinks', 'action' => 'delete', $serviceLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLink->id)]) ?>
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
