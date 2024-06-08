<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 * @var \Cake\Collection\CollectionInterface|string[] $genders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="persons form content">
            <?= $this->Form->create($person) ?>
            <fieldset>
                <legend><?= __('Add Person') ?></legend>
                <?php
                    // echo $this->Form->control('internal_id', ['type' => 'text']);
                    echo $this->Form->control('second_name');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('is_confirm_email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('nick_name');
                    echo $this->Form->control('gender_id', ['options' => $genders, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
