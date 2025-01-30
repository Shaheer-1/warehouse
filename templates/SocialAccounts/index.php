<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SocialAccount> $socialAccounts
 */
?>
<div class="socialAccounts index content">
    <?= $this->Html->link(__('New Social Account'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Social Accounts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('provider') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('reference') ?></th>
                    <th><?= $this->Paginator->sort('link') ?></th>
                    <th><?= $this->Paginator->sort('token_secret') ?></th>
                    <th><?= $this->Paginator->sort('token_expires') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socialAccounts as $socialAccount): ?>
                <tr>
                    <td><?= h($socialAccount->id) ?></td>
                    <td><?= $socialAccount->hasValue('user') ? $this->Html->link($socialAccount->user->username, ['controller' => 'Users', 'action' => 'view', $socialAccount->user->id]) : '' ?></td>
                    <td><?= h($socialAccount->provider) ?></td>
                    <td><?= h($socialAccount->username) ?></td>
                    <td><?= h($socialAccount->reference) ?></td>
                    <td><?= h($socialAccount->link) ?></td>
                    <td><?= h($socialAccount->token_secret) ?></td>
                    <td><?= h($socialAccount->token_expires) ?></td>
                    <td><?= h($socialAccount->active) ?></td>
                    <td><?= h($socialAccount->created) ?></td>
                    <td><?= h($socialAccount->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $socialAccount->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialAccount->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialAccount->id)]) ?>
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