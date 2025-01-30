<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RackRowsFixture
 */
class RackRowsFixture extends TestFixture
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
                'id' => '841dd34c-65e2-4c1d-94f8-cfdf745528a7',
                'row_code' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-25 19:37:52',
                'modified' => '2025-01-25 19:37:52',
            ],
        ];
        parent::init();
    }
}
