<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\Log\Log;

/**
 * Cells Model
 *
 * @property \App\Model\Table\RackRowsTable&\Cake\ORM\Association\BelongsTo $RackRows
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\Cell newEmptyEntity()
 * @method \App\Model\Entity\Cell newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cell> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cell get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cell findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cell patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cell> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cell|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cell saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CellsTable extends Table
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

        $this->setTable('cells');
        $this->setDisplayField('cell_code');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RackRows', [
            'foreignKey' => 'rack_row_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'cell_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'cells_products',
            'dependent' => true
        ]);

        // Add the behavior to your table
        $this->addBehavior('Search.Search');
        // Setup search filter using search manager
        $this->searchManager()
            ->value('rack_row')
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.
            ->add('cell_code', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'fields' => ['cell_code'],
            ])
            ->add('foo', 'Search.Callback', [
                'callback' => function (\Cake\ORM\Query $query, array $args, \Search\Model\Filter\Base $filter) {
                    // Modify $query as required
                }
            ]);
    }
    /**
     * beforeSave
     */
    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->product_code_string) {
            $entity->products = $this->_buildProducts($entity);
        }
        // Debug the entity data 
        // Log::debug('Entity before save: ' . json_encode($entity));
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
            ->uuid('rack_row_id')
            ->notEmptyString('rack_row_id');

        $validator
            ->scalar('cell_code')
            ->maxLength('cell_code', 255)
            ->requirePresence('cell_code', 'create')
            ->notEmptyString('cell_code')
            ->add('cell_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['cell_code']), ['errorField' => 'cell_code']);
        $rules->add($rules->existsIn(['rack_row_id'], 'RackRows'), ['errorField' => 'rack_row_id']);

        return $rules;
    }
    protected function _buildProducts($entity)
    {
        // Trim Products
        $product_code_string = $entity->product_code_string;
        $newProducts = array_map('trim', explode(',', $product_code_string));
        // Remove all empty Products
        $newProducts = array_filter($newProducts);
        // Reduce duplicated Products
        $newProducts = array_unique($newProducts);

        $out = [];

        // find and remove duplicate Products using sku
        foreach ($newProducts as $key => $value) {
            $val = explode('@', $value);
            $product = $this->Products->find()
            ->where(['Products.sku' => $val[0]])
            ->first();
            if ($product) {
                unset($newProducts[$key]);
                $out[] = $product;
            }else{
                $out[] = $this->Products->newEntity([
                    'sku' => $val[0],
                    'product_details' => $val[1],
                    'principal_id' => $entity->principal_id,
                ]);
            }
        }
        return $out;
    }
}
