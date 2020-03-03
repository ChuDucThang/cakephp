<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $image
 * @property string $fullname
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property int $level
 * @property int $status
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'image' => true,
        'fullname' => true,
        'phone' => true,
        'address' => true,
        'email' => true,
        'level' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

}
