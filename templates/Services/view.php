<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Service Links'), ['controller' => 'ServiceLinks', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Service Link'), ['controller' => 'ServiceLinks', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="services view large-9 medium-8 columns content">
    <h3><?= h($service->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($service->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Url') ?></th>
                <td><?= h($service->url) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($service->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Service Links') ?></h4>
        <?php if (!empty($service->service_links)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Person Id') ?></th>
                    <th scope="col"><?= __('Service Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($service->service_links as $serviceLinks): ?>
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
