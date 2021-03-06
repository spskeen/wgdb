<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WrestlersPersonality Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Wrestlers
 * @property \Cake\ORM\Association\BelongsTo $Personalities
 *
 * @method \App\Model\Entity\WrestlersPersonality get($primaryKey, $options = [])
 * @method \App\Model\Entity\WrestlersPersonality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WrestlersPersonality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WrestlersPersonality|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WrestlersPersonality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WrestlersPersonality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WrestlersPersonality findOrCreate($search, callable $callback = null, $options = [])
 */
class WrestlersPersonalityTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('wrestlers_personality');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Wrestlers', [
            'foreignKey' => 'wrestler_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personalities', [
            'foreignKey' => 'personalities_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['wrestler_id'], 'Wrestlers'));
        $rules->add($rules->existsIn(['personalities_id'], 'Personalities'));

        return $rules;
    }
}
