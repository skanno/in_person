<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLink $serviceLink
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $services
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serviceLink->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLink->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Service Links'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
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
    </div>
</div>
