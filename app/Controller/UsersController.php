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

     public function login(){
         if($this->request->is('post')){
             if($this->Auth->login()){
                 $this->redirect($this->Auth->redirect());

             }else{
                 $this->Session->setFlash('Wrong username or password','default', array('class'=>'alert alert-danger'), 'auth' );
             }
         }
         $this->set('title_for_layout', 'Login pels');
     }

    public function admin_logout(){
        $this->redirect($this->Auth->logout());
    }
//Frontend usercontroller 
    public function index(){

    }

    public function profile(){
        if($this->Auth->login()){
            $userInAuth= $this->Auth->user();
            $user = $this->User->find('first', array(
                'conditions'=> array('_id'=> $userInAuth["_id"])
            ));
            $this->loadModel("Playlist");
            if(isset($user["User"]["history"])){
                foreach ($user["User"]["history"] as $key=>$item) {
                    $playlists[] = $this->Playlist->find('first', array(
                        'conditions'=> array('_id'=> $key),
                        'fields'=>array('name','text')
                    ));
                }
            }else {
                $playlists = [];
            }


            $this->set('user_info', $user);
            $this->set('playlists', $playlists);
            if (!empty($this->request->data)) {

                //pr($this->data); exit;
                if ($this->User->save($this->data)) {
                    $this->redirect(array("action"=>"profile"));
                } else {
                }
            }
            if (empty($this->data)) {
                $this->data = $this->User->read(null, $userInAuth["_id"]);
                //$this->data = $this->Post->find('first', array('conditions' => array('_id' => $id)));
            }
        }


    }

    public function history(){
        if( $this->request->is('ajax')) {
            $idPlaylist = $this->request->data["idplaylist"];
            $partId = $this->request->data["partid"];
            $point = $this->request->data["point"];
            $this->loadModel("Playlist");

            $playlist = $this->Playlist->find('first',array(
                'conditions'=> array('_id'=>$idPlaylist)
            ));
            if($this->Auth->login()){
                $user = $this->User->read(null, $this->Auth->user()["_id"]);
                $user["User"]["history"][$idPlaylist][$partId]= $point;
                $this->User->save($user);
                echo json_encode($user["User"]["history"][$idPlaylist]); exit;
                //echo $playlist["Playlist"]["_id"];

                //echo $user["User"]["History"]["Can You Say That Again"]["parts"][1];  exit;
            }else {
                echo "Đã login đếu đâu!"; exit;
            }

             //pr($history);  exit;
            //echo json_encode(array(0=>$playlist["Playlist"]["text"][$keyPart],1=>$playlist["Playlist"]["name"]."/".$playlist["Playlist"]["audio"][$keyPart]));
        }
    }
}
?>