<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 * @var string[]|\Cake\Collection\CollectionInterface $rackRows
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cell->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cell->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cells form content">
            <?php //pr($cell);exit; ?>
            <?= $this->Form->create($cell) ?>
            <fieldset>
                <legend><?= __('Edit Cell') ?></legend>
                <?php
                    echo $this->Form->control('rack_row_id', ['options' => $rackRows]);
                    echo $this->Form->control('cell_code');
                    echo $this->Form->control('principal_id', ['options' => $principals]);
                    echo $this->Form->control('product_code_string', ['type' => 'text']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
