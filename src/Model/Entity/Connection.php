<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Connection Entity
 *
 * @property int $id
 * @property int $office_id
 * @property int $room_id
 * @property int $device_id
 * @property int $software_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Office $office
 * @property \App\Model\Entity\Room $room
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Software $software
 */
class Connection extends Entity
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
        'office_id' => true,
        'room_id' => true,
        'device_id' => true,
        'software_id' => true,
        'created' => true,
        'modified' => true,
        'office' => true,
        'room' => true,
        'device' => true,
        'software' => true
    ];
}
