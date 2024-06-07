<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonLinks Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 *
 * @method \App\Model\Entity\PersonLink newEmptyEntity()
 * @method \App\Model\Entity\PersonLink newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PersonLink> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonLink get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PersonLink findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PersonLink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PersonLink> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonLink|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PersonLink saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PersonLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PersonLink>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PersonLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PersonLink> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PersonLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PersonLink>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PersonLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PersonLink> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonLinksTable extends Table
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

        $this->setTable('person_links');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Persons', [
            'foreignKey' => 'from_person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'to_person_id',
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
            ->notEmptyString('from_person_id');

        $validator
            ->notEmptyString('to_person_id');

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
        $rules->add($rules->isUnique(['from_person_id', 'to_person_id']), ['errorField' => 'from_person_id']);
        $rules->add($rules->existsIn(['from_person_id'], 'Persons'), ['errorField' => 'from_person_id']);
        $rules->add($rules->existsIn(['to_person_id'], 'Persons'), ['errorField' => 'to_person_id']);

        return $rules;
    }
}
