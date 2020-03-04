<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $cat_id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property float $price
 * @property int $status
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 *
 * @property \App\Model\Entity\Cat $cat
 */
class Product extends Entity
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
        'cat_id' => true,
        'name' => true,
        'image' => true,
        'description' => true,
        'price' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'cat' => true,
    ];
}
