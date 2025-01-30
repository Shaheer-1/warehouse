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
            <?= $this->Html->link(__('Edit Rack Row'), ['action' => 'edit', $rackRow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rack Row'), ['action' => 'delete', $rackRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rackRow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Rack Rows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rack Row'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="rackRows view content">
            <h3><?= h($rackRow->row_code) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($rackRow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Row Code') ?></th>
                    <td><?= h($rackRow->row_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($rackRow->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($rackRow->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cells') ?></h4>
                <?php if (!empty($rackRow->cells)) : ?>
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
                        <?php foreach ($rackRow->cells as $cell) : ?>
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