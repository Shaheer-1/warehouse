<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CellsProduct> $cellsProducts
 */
?>
<div class="cellsProducts index content">
    <?= $this->Html->link(__('New Cells Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cells Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cell_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cellsProducts as $cellsProduct): ?>
                <tr>
                    <td><?= h($cellsProduct->id) ?></td>
                    <td><?= $cellsProduct->hasValue('cell') ? $this->Html->link($cellsProduct->cell->cell_code, ['controller' => 'Cells', 'action' => 'view', $cellsProduct->cell->id]) : '' ?></td>
                    <td><?= $cellsProduct->hasValue('product') ? $this->Html->link($cellsProduct->product->sku, ['controller' => 'Products', 'action' => 'view', $cellsProduct->product->id]) : '' ?></td>
                    <td><?= h($cellsProduct->created) ?></td>
                    <td><?= h($cellsProduct->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cellsProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cellsProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cellsProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cellsProduct->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>