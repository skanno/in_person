<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceLinks Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\ServiceLink newEmptyEntity()
 * @method \App\Model\Entity\ServiceLink newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ServiceLink> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceLink get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ServiceLink findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ServiceLink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ServiceLink> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceLink|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ServiceLink saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceLink>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceLink> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceLink>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceLink> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ServiceLinksTable extends Table
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

        $this->setTable('service_links');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
            ->notEmptyString('service_id');

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
        $rules->add($rules->isUnique(['person_id', 'service_id']), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
