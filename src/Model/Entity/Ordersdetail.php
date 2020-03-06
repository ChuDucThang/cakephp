<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ordersdetail Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $quantity
 * @property float $price
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Order $order
 */
class Ordersdetail extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'order_id' => true,
        'quantity' => true,
        'price' => true,
        'created_at' => true,
        'updated_at' => true,
        'product' => true,
        'order' => true,
    ];
}
