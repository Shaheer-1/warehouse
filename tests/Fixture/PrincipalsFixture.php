<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrincipalsFixture
 */
class PrincipalsFixture extends TestFixture
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
                'id' => 'ebf5ab6a-3140-4648-a7d6-32e62d231f25',
                'principal_name' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-25 19:37:52',
                'modified' => '2025-01-25 19:37:52',
            ],
        ];
        parent::init();
    }
}
