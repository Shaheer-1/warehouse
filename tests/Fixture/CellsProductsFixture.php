<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CellsProductsFixture
 */
class CellsProductsFixture extends TestFixture
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
                'id' => '22799bdb-46f7-43cc-999c-b768b2f9c355',
                'cell_id' => 'c9eaeaaa-ffc6-4e8c-99ff-d47110bf56a0',
                'product_id' => 'eb1f63bf-999c-4ea0-bd1d-63471a20eb0c',
                'created' => '2025-01-25 19:37:51',
                'modified' => '2025-01-25 19:37:51',
            ],
        ];
        parent::init();
    }
}
