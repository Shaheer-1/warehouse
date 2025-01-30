<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CellsFixture
 */
class CellsFixture extends TestFixture
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
                'id' => 'e5089bdd-1051-4f08-a459-30df1c0029ee',
                'rack_row_id' => '243a65d3-a10e-4eee-be4a-646b4d8c79e1',
                'cell_code' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-25 19:37:43',
                'modified' => '2025-01-25 19:37:43',
            ],
        ];
        parent::init();
    }
}
