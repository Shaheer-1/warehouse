<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cell'), ['action' => 'edit', $cell->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cell'), ['action' => 'delete', $cell->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cell->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cell'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cells view content">
            <h3><?= h($cell->cell_code) ?></h3>
            <table>
                <tr>
                    <!-- <th><?= __('Id') ?></th>
                    <td><?= h($cell->id) ?></td> -->
                </tr>
                <tr>
                    <th><?= __('Rack Row') ?></th>
                    <td><?= $cell->hasValue('rack_row') ? $this->Html->link($cell->rack_row->row_code, ['controller' => 'RackRows', 'action' => 'view', $cell->rack_row->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cell Code') ?></th>
                    <td><?= h($cell->cell_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cell->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cell->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($cell->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th> -->
                            <!-- <th><?= __('Principal Id') ?></th> -->
                            <th><?= __('SKU') ?></th>
                            <th><?= __('Product Details') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cell->products as $product) : ?>
                        <tr>
                            <!-- <td><?= h($product->id) ?></td> -->
                            <!-- <td><?= h($product->principal_id) ?></td> -->
                            <td><?= h($product->sku) ?></td>
                            <td><?= h($product->product_details) ?></td>
                            <td><?= h($product->created) ?></td>
                            <td><?= h($product->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>