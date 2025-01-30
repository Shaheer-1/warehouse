<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cell> $cells
 */

use PhpParser\Node\Stmt\Foreach_;
use QrCode\QrCode;
?>
<style>
    .inline-form {
      display: flex; /* Makes form elements inline */
      gap: 10px; /* Adds space between elements */
    }
    .inline-form input,
    .inline-form button {
      margin: 0; /* Removes any default margin */
    }
    .l-btn{
      margin-left: 10px;
    }
</style>
<?= $this->Html->css('/node_modules/@fortawesome/fontawesome-free/css/all.min.css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- In your layout file, e.g., templates/layout/default.php -->
<?= $this->Html->css('image_button_animation.css') ?>

<div class="cells index content ">
    <!-- <div class=""> -->
    <?= $this->Html->link(__('New Cell'), ['action' => 'add'], ['class' => 'button float-right l-btn']) ?>
    <?php
        echo $this->Form->create(null, ['valueSources' => 'query','class' => ' float-right inline-form']);
        if ($this->Search->isSearch()) {
            echo $this->Search->resetLink(__('Reset'), ['class' => 'button']);
        }
        echo $this->Form->control('cell_code',[
            'class' => 'floating-label',
            'label' => false,
            'placeholder' => 'cell code',
        ]);
        echo $this->Form->button('Filter', ['type' => 'submit']);
        echo $this->Form->end();
    ?>
    <!-- </div> -->
    <h3><?= __('Cells') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <th><?= $this->Paginator->sort('rack_row_id') ?></th>
                    <th><?= $this->Paginator->sort('cell_code') ?></th>
                    <th><?= $this->Paginator->sort('principal') ?></th>
                    <th><?= $this->Paginator->sort('SKU') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('Online Code') ?></th>
                    <th><?= $this->Paginator->sort('Offline Code') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cells as $cell): ?>
                    <?php //pr($cells);exit;
                        $info = '';
                    ?>
                <tr>
                    <!-- <td><?= h($cell->id) ?></td> -->
                    <td><?= $cell->hasValue('rack_row') ? $this->Html->link($cell->rack_row->row_code, ['controller' => 'RackRows', 'action' => 'view', $cell->rack_row->id]) : '' ?></td>
                    <td><?= h($cell->cell_code) ?></td>
                    <td>
                    <?php 
                        if($cell->hasValue('products')){
                            foreach ($cell->products as $key => $value) {
                                echo $this->Html->link($value->principal->principal_name, ['controller' => 'Principals', 'action' => 'view', $value->principal->id])."</br>";
                            }
                        }
                    ?>
                    </td>
                    <td>
                    <?php 
                        if($cell->hasValue('products')){
                            foreach ($cell->products as $key => $value) {
                                echo $this->Html->link($value->sku, ['controller' => 'Products', 'action' => 'view', $value->id])."</br>";
                            }
                        }
                    ?>
                    </td>
                    <td>
                    <!-- In your view file, e.g., templates/SomeView/index.php -->
                    <?php
                        if($cell->hasValue('products')){
                            foreach ($cell->products as $key => $value) {
                                echo $this->Html->link($value->product_details, ['controller' => 'Products', 'action' => 'view', $value->id])."</br>";
                                $info .= "[ ".$value->principal->principal_name." - ".
                                $value->sku." - ".$value->product_details." ]";
                            }
                        }
                    ?>
                    </td>
                    <td>
                        <?php
                            $url = $this->Url->build($this->getRequest()->getPath(), ['fullBase' => true]).'/v/'.$cell->id;
                            // Define options
                            $options = [
                                'size' => 200,
                                'margin' => 10,
                                'level' => 'H',
                                'color' => [0, 0, 0], // Black color
                                'background' => [255, 255, 255] // White background
                            ];
                        ?>
                        <div class="qr-code-container">
                        <?=
                        $this->QrCode->image($url,$options) 
                        ?>
                        <button onclick="openModal()" class="button animated-button">view</button>

                    </td>
                    <td>
                        <?= $this->QrCode->image($info,$options)?>
                        <button onclick="openModal()" class="button animated-button">view</button>
                    </td>
                    <!-- <td><?= h($cell->created) ?></td> -->
                    <!-- <td><?= h($cell->modified) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cell->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cell->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cell->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cell->id)]) ?>
                    </td>
                </tr>
                <?php 
                    endforeach; 
                ?>
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

<div id="printModal" class="modal" >
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="printableContent">
            <h3><?= $cell->rack_row->row_code." - ".$cell->cell_code ?></h3>
            <?=
                $this->QrCode->image($url,$options) 
            ?>
        </div>
        <button onclick="printModalContent()" class="button">Print</button>
    </div>
</div>

<style>
/* Basic Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background: #fff;
    padding: 20px;
    width: 30%;
    margin: 5% auto;
    text-align: center;
    border-radius: 5px;
}

.close {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 24px;
    cursor: pointer;
}
</style>
<script>
function openModal() {
    document.getElementById("printModal").style.display = "block";
}

function closeModal() {
    document.getElementById("printModal").style.display = "none";
}

function printModalContent() {
    var printContents = document.getElementById('printableContent').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(); // Restore the original page
}
</script>
