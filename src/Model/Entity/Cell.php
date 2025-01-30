<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

/**
 * Cell Entity
 *
 * @property string $id
 * @property string $rack_row_id
 * @property string $cell_code
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\RackRow $rack_row
 * @property \App\Model\Entity\Product[] $products
 */
class Cell extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'rack_row_id' => true,
        'cell_code' => true,
        'created' => true,
        'modified' => true,
        'rack_row' => true,
        'products' => true,
        'product_code_string' => true,
        'principal_id' => true,
    ];

    protected function _getProductCodeString()
    {
        if (isset($this->_fields['product_code_string'])) {
            return $this->_fields['product_code_string'];
        }
        if (empty($this->products)) {
            return '';
        }
        $products = new Collection($this->products);
        $str = $products->reduce(function ($string, $products) {
            return $string . $products->sku .'@'.$products->product_details.', ';
        }, '');

        return trim($str, ', ');
    }
}
