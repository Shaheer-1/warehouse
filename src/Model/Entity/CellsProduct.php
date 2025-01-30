<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CellsProduct Entity
 *
 * @property string $id
 * @property string $cell_id
 * @property string $product_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Cell $cell
 * @property \App\Model\Entity\Product $product
 */
class CellsProduct extends Entity
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
        'cell_id' => true,
        'product_id' => true,
        'created' => true,
        'modified' => true,
        'cell' => true,
        'product' => true,
    ];
}
