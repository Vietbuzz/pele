<?php
/**
*  UsersController
*  Cuongnm
*/
class UsersController extends AppController
{

    //public $components = array('Auth');

//backend usercontroller 
    // public function beforeFilter() {
    //     $this->Auth->allow('add');
    //     parent::beforeFilter();
    // }

	public function admin_index()
    {
        $this->layout = 'admin';
        //exit;
        
    }

    public function admin_list(){
         $this->layout = 'admin';
    	$results = $this->User->find('all');
    	$this->set(compact('results'));

    }


    public function admin_add(){
        $this->layout = 'admin';
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $this->User->create();
                if ($this->User->save($this->request->data)){
                    $this->redirect(array('controller' => 'users', 
                                         'action' => 'index', 
                                         $this->request->data));
                }else{
                    $this->Session->setFlash(__('Save Failed.'));
                }
            }
        }
    	
    }

    public function admin_delete($id = null){
        $this->layout = 'admin';
        $this->request->allowMethod('post');
        $id = $this->User->findById($_id);
        //$this->User->_id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_edit($id = null){
        $this->layout = 'admin';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    // public function login(){
    // }

    public function admin_logout(){
        $this->redirect($this->Auth->logout());
    }
//Frontend usercontroller 
    public function index(){

    }




}
?>