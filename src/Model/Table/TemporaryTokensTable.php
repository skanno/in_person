<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TemporaryTokens Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @method \App\Model\Entity\TemporaryToken newEmptyEntity()
 * @method \App\Model\Entity\TemporaryToken newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TemporaryToken> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TemporaryToken get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TemporaryToken findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TemporaryToken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TemporaryToken> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TemporaryToken|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TemporaryToken saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TemporaryToken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TemporaryToken>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TemporaryToken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TemporaryToken> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TemporaryToken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TemporaryToken>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TemporaryToken>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TemporaryToken> deleteManyOrFail(iterable $entities, array $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TemporaryTokensTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('temporary_tokens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('person_id');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);

        return $rules;
    }
}
