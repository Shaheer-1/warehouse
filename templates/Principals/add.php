<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Principal $principal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Principals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="principals form content">
            <?= $this->Form->create($principal) ?>
            <fieldset>
                <legend><?= __('Add Principal') ?></legend>
                <?php
                    echo $this->Form->control('principal_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
