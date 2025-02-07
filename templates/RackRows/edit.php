<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RackRow $rackRow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rackRow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rackRow->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Rack Rows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="rackRows form content">
            <?= $this->Form->create($rackRow) ?>
            <fieldset>
                <legend><?= __('Edit Rack Row') ?></legend>
                <?php
                    echo $this->Form->control('row_code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
