<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

     public function initialize(array $config): void
     {
          parent::initialize($config);

          $this->setTable('users');
          $this->setDisplayField('name');
          $this->setPrimaryKey('id');
     }

     public function validationDefault(Validator $validator): Validator
     {
          $validator
              ->scalar('username')
              ->maxLength('username', 50)
              ->requirePresence('username', 'create')
              ->notEmptyString('username');

          $validator
              ->scalar('name')
              ->maxLength('name', 60)
              ->requirePresence('name', 'create')
              ->notEmptyString('name');

          $validator
              ->scalar('gender')
              ->maxLength('gender', 10)
              ->requirePresence('gender', 'create')
              ->notEmptyString('gender');

          $validator
              ->email('email')
              ->requirePresence('email', 'create')
              ->notEmptyString('email');

          $validator
              ->scalar('city')
              ->maxLength('city', 80)
              ->requirePresence('city', 'create')
              ->notEmptyString('city');

          return $validator;
     }

     public function buildRules(RulesChecker $rules): RulesChecker
     {
          $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
          $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

          return $rules;
     }
}

