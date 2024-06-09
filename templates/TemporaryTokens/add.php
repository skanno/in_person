<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TemporaryToken $temporaryToken
 * @var \Cake\Collection\CollectionInterface|string[] $persons
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Temporary Tokens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="temporaryTokens form content">
            <?= $this->Form->create($temporaryToken) ?>
            <fieldset>
                <legend><?= __('Add Temporary Token') ?></legend>
                <?php
                    echo $this->Form->control('person_id', ['options' => $persons]);
                    echo $this->Form->control('token');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
