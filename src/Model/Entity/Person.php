<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\I18n\DateTime;
use Cake\ORM\Entity;
use Cake\ORM\Locator\TableLocator;
use Cake\Utility\Text;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $internal_id
 * @property string $second_name
 * @property string $first_name
 * @property string $email
 * @property bool $is_confirm_email
 * @property string $password
 * @property string $nick_name
 * @property int|null $gender_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\ServiceLink[] $service_links
 */
class Person extends Entity
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
        'internal_id' => true,
        'second_name' => true,
        'first_name' => true,
        'email' => true,
        'is_confirm_email' => true,
        'password' => true,
        'nick_name' => true,
        'gender_id' => true,
        'created' => true,
        'modified' => true,
        'gender' => true,
        'service_links' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

    /**
     * Undocumented function
     *
     * @param string $password
     * @return string|null
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function getTemporaryToken(): string
    {
        $tableLocator = new TableLocator();
        $temporaryTokens = $tableLocator->get('temporary_tokens');

        $temporaryToken = $temporaryTokens->newEmptyEntity();
        $temporaryToken->person_id = $this->id;
        $temporaryToken->token = Text::uuid();
        $temporaryToken->created = new DateTime();
        $temporaryTokens->save($temporaryToken);

        return $temporaryToken->token;
    }
}
