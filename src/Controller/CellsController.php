<?php
declare(strict_types=1);

namespace App\Controller;

use CakePdf\View\PdfView;
use Cake\ORM\TableRegistry;
use CakeDC\SearchFilter\Manager;
use QrCode\QrCode;
/**
 * Cells Controller
 *
 * @property \App\Model\Table\CellsTable $Cells
 */
class CellsController extends AppController
{
    // public $Principals;
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Search.Search', [
            'actions' => ['index', 'lookup'],
        ]);
        
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cells
            // ->find()
            ->find('search', search: $this->request->getQueryParams())
            ->contain(['RackRows', 'Products'=> ['Principals']]);
        $cells = $this->paginate($query);
        $this->set(compact('cells'));
    }

    /**
     * View method
     *
     * @param string|null $id Cell id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cell = $this->Cells->get($id, contain: ['RackRows', 'Products']);
        // Load QRCode Helper manually
        
        $this->viewBuilder()->setClassName(PdfView::class);
        $this->viewBuilder()->setOption('pdfConfig', [
            'orientation' => 'portrait',
            'filename' => $cell['cell_code'] . $id . '.pdf',
        ]);
        $this->set(compact('cell'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cell = $this->Cells->newEmptyEntity();
        if ($this->request->is('post')) {


            $cell = $this->Cells->patchEntity($cell, $this->request->getData());
            // pr($cell);exit;
            if ($this->Cells->save($cell)) {
                // Save the associated products with principal_id
                // foreach ($cell['products'] as $productData) {
                //     $product = $this->Products->newEmptyEntity();
                //     $productData['principal_id'] = $principalId;
                //     $product = $this->Products->patchEntity($product, $productData);
                //     $this->Products->save($product);

                //     // Associate the product with the cell
                //     $this->Cells->CellsProducts->link($cell, [$product]);
                // }

                $this->Flash->success(__('The cell has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cell could not be saved. Please, try again.'));
        }
        $rackRows = $this->Cells->RackRows->find('list', limit: 200)->all();
        $products = $this->Cells->Products->find('list',limit:200)->all();
        $principals = $this->Cells->Products->Principals->find('list',limit:200)->all();

        $this->set(compact('cell', 'rackRows', 'products', 'principals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cell id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cell = $this->Cells->get($id, contain: ['Products']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cell = $this->Cells->patchEntity($cell, $this->request->getData());
            if ($this->Cells->save($cell)) {
                $this->Flash->success(__('The cell has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cell could not be saved. Please, try again.'));
        }
        $rackRows = $this->Cells->RackRows->find('list', limit: 200)->all();
        $products = $this->Cells->Products->find('list', limit: 200)->all();
        $principals = $this->Cells->Products->Principals->find('list',limit:200)->all();
        $this->set(compact('cell', 'rackRows', 'products', 'principals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cell id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cell = $this->Cells->get($id);
        if ($this->Cells->delete($cell)) {
            $this->Flash->success(__('The cell has been deleted.'));
        } else {
            $this->Flash->error(__('The cell could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
