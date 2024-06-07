<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Persons Model
 *
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\ServiceLinksTable&\Cake\ORM\Association\HasMany $ServiceLinks
 *
 * @method \App\Model\Entity\Person newEmptyEntity()
 * @method \App\Model\Entity\Person newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Person> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Person findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Person> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonsTable extends Table
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

        $this->setTable('persons');
        $this->setDisplayField('internal_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
        ]);
        $this->hasMany('ServiceLinks', [
            'foreignKey' => 'person_id',
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
            ->scalar('internal_id')
            ->maxLength('internal_id', 254)
            ->requirePresence('internal_id', 'create')
            ->notEmptyString('internal_id')
            ->add('internal_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('second_name')
            ->maxLength('second_name', 100)
            ->requirePresence('second_name', 'create')
            ->notEmptyString('second_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 100)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->boolean('is_confirm_email')
            ->notEmptyString('is_confirm_email');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('nick_name')
            ->maxLength('nick_name', 100)
            ->requirePresence('nick_name', 'create')
            ->notEmptyString('nick_name');

        $validator
            ->allowEmptyString('gender_id');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['internal_id']), ['errorField' => 'internal_id']);
        $rules->add($rules->existsIn(['gender_id'], 'Genders'), ['errorField' => 'gender_id']);

        return $rules;
    }
}
