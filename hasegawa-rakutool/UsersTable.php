<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserTypesTable&\Cake\ORM\Association\BelongsTo $UserTypes
 * @property \App\Model\Table\SmtpsTable&\Cake\ORM\Association\BelongsTo $Smtps
 * @property \App\Model\Table\RStoresTable&\Cake\ORM\Association\BelongsTo $RStores
 * @property \App\Model\Table\MsnsTable&\Cake\ORM\Association\BelongsTo $Msns
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
            'joinType' => 'INNER',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('shop_name')
            ->maxLength('shop_name', 255)
            ->requirePresence('shop_name', 'create')
            ->notEmptyString('shop_name');

        $validator
            ->scalar('shop_user_name')
            ->maxLength('shop_user_name', 255)
            ->allowEmptyString('shop_user_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('mail_from')
            ->maxLength('mail_from', 255)
            ->allowEmptyString('mail_from');

        $validator
            ->scalar('smtp_password')
            ->maxLength('smtp_password', 255)
            ->allowEmptyString('smtp_password');

        $validator
            ->scalar('mail_bcc')
            ->maxLength('mail_bcc', 255)
            ->allowEmptyString('mail_bcc');

        $validator
            ->scalar('mail_signature')
            ->allowEmptyString('mail_signature');

        $validator
            ->numeric('profit_per')
            ->allowEmptyString('profit_per');

        $validator
            ->numeric('fee_per')
            ->allowEmptyString('fee_per');

        $validator
            ->scalar('r_api_service_secret')
            ->maxLength('r_api_service_secret', 255)
            ->allowEmptyString('r_api_service_secret');

        $validator
            ->scalar('r_api_license_key')
            ->maxLength('r_api_license_key', 255)
            ->allowEmptyString('r_api_license_key');

        $validator
            ->scalar('msn_token')
            ->maxLength('msn_token', 255)
            ->allowEmptyString('msn_token');

        $validator
            ->scalar('ng_word')
            ->allowEmptyString('ng_word');

        $validator
            ->integer('shipping_ss')
            ->allowEmptyString('shipping_ss');

        $validator
            ->integer('shipping_60')
            ->allowEmptyString('shipping_60');

        $validator
            ->integer('shipping_80')
            ->allowEmptyString('shipping_80');

        $validator
            ->integer('shipping_100')
            ->allowEmptyString('shipping_100');

        $validator
            ->integer('shipping_120')
            ->allowEmptyString('shipping_120');

        $validator
            ->integer('shipping_140')
            ->allowEmptyString('shipping_140');

        $validator
            ->boolean('auto_listing_flag')
            ->allowEmptyString('auto_listing_flag');

        $validator
            ->boolean('delete_flag')
            ->allowEmptyString('delete_flag');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));

        return $rules;
    }
}
