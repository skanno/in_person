<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServiceLink Entity
 *
 * @property int $id
 * @property int $person_id
 * @property int $service_id
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Service $service
 */
class ServiceLink extends Entity
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
        'person_id' => true,
        'service_id' => true,
        'person' => true,
        'service' => true,
    ];
}
