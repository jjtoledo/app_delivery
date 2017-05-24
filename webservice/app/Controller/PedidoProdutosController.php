<?php
App::uses('AppController', 'Controller');
/**
 * PedidoProdutos Controller
 *
 * @property PedidoProduto $PedidoProduto
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PedidoProdutosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PedidoProduto->recursive = 0;
		$this->set('pedidoProdutos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PedidoProduto->exists($id)) {
			throw new NotFoundException(__('Invalid pedido produto'));
		}
		$options = array('conditions' => array('PedidoProduto.' . $this->PedidoProduto->primaryKey => $id));
		$this->set('pedidoProduto', $this->PedidoProduto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PedidoProduto->create();
			if ($this->PedidoProduto->save($this->request->data)) {
				$this->Session->setFlash(__('The pedido produto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedido produto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$pedidos = $this->PedidoProduto->Pedido->find('list');
		$produtos = $this->PedidoProduto->Produto->find('list');
		$this->set(compact('pedidos', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PedidoProduto->exists($id)) {
			throw new NotFoundException(__('Invalid pedido produto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PedidoProduto->save($this->request->data)) {
				$this->Session->setFlash(__('The pedido produto has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedido produto could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('PedidoProduto.' . $this->PedidoProduto->primaryKey => $id));
			$this->request->data = $this->PedidoProduto->find('first', $options);
		}
		$pedidos = $this->PedidoProduto->Pedido->find('list');
		$produtos = $this->PedidoProduto->Produto->find('list');
		$this->set(compact('pedidos', 'produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PedidoProduto->id = $id;
		if (!$this->PedidoProduto->exists()) {
			throw new NotFoundException(__('Invalid pedido produto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PedidoProduto->delete()) {
			$this->Session->setFlash(__('The pedido produto has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pedido produto could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
