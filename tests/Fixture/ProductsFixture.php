<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'id' => 'bf55fa9e-e78b-44e4-b421-fcddceaf83d4',
                'principal_id' => 'c3a65be6-01fb-42a3-a4df-09fbf5e8842c',
                'sku' => 'Lorem ipsum dolor sit amet',
                'product_details' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-01-25 19:37:52',
                'modified' => '2025-01-25 19:37:52',
            ],
        ];
        parent::init();
    }
}
