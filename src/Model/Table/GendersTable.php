<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Genders Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\HasMany $Persons
 *
 * @method \App\Model\Entity\Gender newEmptyEntity()
 * @method \App\Model\Entity\Gender newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Gender> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gender get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Gender findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Gender patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Gender> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gender|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Gender saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Gender>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gender>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Gender>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gender> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Gender>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gender>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Gender>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gender> deleteManyOrFail(iterable $entities, array $options = [])
 */
class GendersTable extends Table
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

        $this->setTable('genders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Persons', [
            'foreignKey' => 'gender_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
