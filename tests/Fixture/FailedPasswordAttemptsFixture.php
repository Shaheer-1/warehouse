<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FailedPasswordAttemptsFixture
 */
class FailedPasswordAttemptsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'aee7e9d8-6b81-430f-9a0d-95890318c89d',
                'user_id' => '77806194-28e9-4d32-b064-1e09fc5971bb',
                'created' => '2025-01-25 19:37:52',
            ],
        ];
        parent::init();
    }
}
