<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agences Model
 *
 * @method \App\Model\Entity\Agence newEmptyEntity()
 * @method \App\Model\Entity\Agence newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Agence> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agence get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Agence findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Agence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Agence> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agence|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Agence saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Agence>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Agence>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Agence>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Agence> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Agence>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Agence>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Agence>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Agence> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgencesTable extends Table
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

        $this->setTable('agences');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmptyString('name');

        $validator
            ->scalar('ville')
            ->maxLength('ville', 255)
            ->requirePresence('ville', 'create')
            ->notEmptyString('ville');

        $validator
            ->scalar('adresse')
            ->maxLength('adresse', 255)
            ->requirePresence('adresse', 'create')
            ->notEmptyString('adresse');

        $validator
            ->email('email')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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

        return $rules;
    }
}
