<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Software Entity
 *
 * @property int $id
 * @property string $softwareName
 * @property string $softwareLicence
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Connection[] $connections
 */
class Software extends Entity
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
        'softwareName' => true,
        'softwareLicence' => true,
        'created' => true,
        'modified' => true,
        'connections' => true
    ];
}
