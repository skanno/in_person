<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonLink $personLink
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Person Links'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
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
    </div>
</div>
