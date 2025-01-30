<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FailedPasswordAttempt> $failedPasswordAttempts
 */
?>
<div class="failedPasswordAttempts index content">
    <?= $this->Html->link(__('New Failed Password Attempt'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Failed Password Attempts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($failedPasswordAttempts as $failedPasswordAttempt): ?>
                <tr>
                    <td><?= h($failedPasswordAttempt->id) ?></td>
                    <td><?= $failedPasswordAttempt->hasValue('user') ? $this->Html->link($failedPasswordAttempt->user->username, ['controller' => 'Users', 'action' => 'view', $failedPasswordAttempt->user->id]) : '' ?></td>
                    <td><?= h($failedPasswordAttempt->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $failedPasswordAttempt->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $failedPasswordAttempt->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $failedPasswordAttempt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $failedPasswordAttempt->id)]) ?>
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