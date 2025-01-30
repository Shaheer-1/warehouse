<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialAccount $socialAccount
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Social Accounts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="socialAccounts form content">
            <?= $this->Form->create($socialAccount) ?>
            <fieldset>
                <legend><?= __('Add Social Account') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('provider');
                    echo $this->Form->control('username');
                    echo $this->Form->control('reference');
                    echo $this->Form->control('avatar');
                    echo $this->Form->control('description');
                    echo $this->Form->control('link');
                    echo $this->Form->control('token');
                    echo $this->Form->control('token_secret');
                    echo $this->Form->control('token_expires', ['empty' => true]);
                    echo $this->Form->control('active');
                    echo $this->Form->control('data');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
