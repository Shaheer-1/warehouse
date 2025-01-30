<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CellsProduct $cellsProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cells Product'), ['action' => 'edit', $cellsProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cells Product'), ['action' => 'delete', $cellsProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cellsProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cells Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cells Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cellsProducts view content">
            <h3><?= h($cellsProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($cellsProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cell') ?></th>
                    <td><?= $cellsProduct->hasValue('cell') ? $this->Html->link($cellsProduct->cell->cell_code, ['controller' => 'Cells', 'action' => 'view', $cellsProduct->cell->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $cellsProduct->hasValue('product') ? $this->Html->link($cellsProduct->product->sku, ['controller' => 'Products', 'action' => 'view', $cellsProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cellsProduct->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cellsProduct->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>