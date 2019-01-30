<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SoftwareConnection Entity
 *
 * @property int $id
 * @property int $office_id
 * @property int $software_id
 * @property int $device_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Software $software
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Office $office
 */
class SoftwareConnection extends Entity
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
        'software_id' => true,
        'device_id' => true,
        'created' => true,
        'modified' => true,
        'software' => true,
        'device' => true,
        'office' => true
    ];
}
