<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="products view content">
            <h3><?= h($product->sku) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Principal') ?></th>
                    <td><?= $product->hasValue('principal') ? $this->Html->link($product->principal->principal_name, ['controller' => 'Principals', 'action' => 'view', $product->principal->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('SKU') ?></th>
                    <td><?= h($product->sku) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Details') ?></th>
                    <td><?= h($product->product_details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($product->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cells') ?></h4>
                <?php if (!empty($product->cells)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Rack Row Id') ?></th>
                            <th><?= __('Cell Code') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->cells as $cell) : ?>
                        <tr>
                            <td><?= h($cell->id) ?></td>
                            <td><?= h($cell->rack_row_id) ?></td>
                            <td><?= h($cell->cell_code) ?></td>
                            <td><?= h($cell->created) ?></td>
                            <td><?= h($cell->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cells', 'action' => 'view', $cell->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cells', 'action' => 'edit', $cell->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cells', 'action' => 'delete', $cell->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cell->id)]) ?>
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