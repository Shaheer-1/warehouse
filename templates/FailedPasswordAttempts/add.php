<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FailedPasswordAttempt $failedPasswordAttempt
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Failed Password Attempts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="failedPasswordAttempts form content">
            <?= $this->Form->create($failedPasswordAttempt) ?>
            <fieldset>
                <legend><?= __('Add Failed Password Attempt') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
