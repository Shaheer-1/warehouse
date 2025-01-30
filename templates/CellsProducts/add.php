<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CellsProduct $cellsProduct
 * @var \Cake\Collection\CollectionInterface|string[] $cells
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cells Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cellsProducts form content">
            <?= $this->Form->create($cellsProduct) ?>
            <fieldset>
                <legend><?= __('Add Cells Product') ?></legend>
                <?php
                    echo $this->Form->control('cell_id', ['options' => $cells]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
