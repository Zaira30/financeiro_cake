<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movimentation Entity
 *
 * @property int $id
 * @property string $descriptions
 * @property int $type
 * @property float $value
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $users_id
 *
 * @property \App\Model\Entity\User $user
 */
class Movimentation extends Entity
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
    protected $_accessible = [
        'descriptions' => true,
        'type' => true,
        'value' => true,
        'created' => true,
        'users_id' => true,
        'user' => true,
    ];
}
