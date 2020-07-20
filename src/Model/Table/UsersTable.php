<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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
		$this->setDisplayField('name');
		$this->setPrimaryKey('id');
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
			->scalar('name')
			->minLength('name', 3, 'Tamanho mínimo de 3 caracteres')
			->maxLength('name', 255, 'Tamanho máximo de 255 caracteres')
			->requirePresence('name', 'create')
			->notEmptyString('name');

		$validator
			->email('email')
			->requirePresence('email', 'create')
			->notEmptyString('email')
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Email já cadastrado']);

		$validator
			->integer('rg', 'Somente caracteres numéricos')
			->minLength('rg', 10, 'Deve conter 10 caracteres')
			->maxLength('rg', 10, 'Deve conter 10 caracteres')
			->requirePresence('rg', 'create')
			->notEmptyString('rg')
			->add('rg', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Registro Geral já cadastrado']);

		$validator
			->integer('cpf', 'Somente caracteres numéricos')
			->minLength('cpf', 11, 'Deve conter 11 caracteres')
			->maxLength('cpf', 11, 'Deve conter 11 caracteres')
			->requirePresence('cpf', 'create')
			->notEmptyString('cpf')
			->add(
				'cpf', 'custom',
				[
					'rule' => function ($cpf, $context)
					{
						for ($t = 9; $t < 11; $t++)
						{
							for ($d = 0, $c = 0; $c < $t; $c++)
							{
								$d += $cpf[$c] * (($t + 1) - $c);
							}

							$d = ((10 * $d) % 11) % 10;

							if ($cpf[$c] != $d)
							{
								return false;
							}
						}

						return true;
					},
					'message' => 'CPF inválido'
				]
			);

		$validator
			->date('data_birth')
			->requirePresence('data_birth', 'create')
			->notEmptyDate('data_birth');

		$validator
			->integer('telephone')
			->requirePresence('telephone', 'create')
			->notEmptyString('telephone')
			->minLength('telephone', 11, 'Deve conter 11 caracteres (DDD + número)')
			->maxLength('telephone', 11, 'Deve conter 11 caracteres (DDD + número)');

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
		$rules->add($rules->isUnique(['rg']));
		$rules->add($rules->isUnique(['cpf'], "CPF já cadastrado"));

		return $rules;
	}
}
