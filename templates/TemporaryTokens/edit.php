<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TemporaryToken $temporaryToken
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $temporaryToken->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $temporaryToken->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Temporary Tokens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="temporaryTokens form content">
            <?= $this->Form->create($temporaryToken) ?>
            <fieldset>
                <legend><?= __('Edit Temporary Token') ?></legend>
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
