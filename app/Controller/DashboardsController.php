<?php
/**
 * Created by PhpStorm.
 * User: buzz
 * Date: 3/23/17
 * Time: 9:22 AM
 */

class DashboardsController extends AppController
{
//frontend---------------------------------------------------------


//admin-----------------------------------------------
    public function admin_index()
    {
        $this->layout = 'admin';
        //exit;
        $this->admin_listuser();
    }

    public function admin_listuser(){
    
    	$dashboards = $this->Dashboard->find('all');
    	$this->set(compact('dashboards'));

    }


    public function admin_adduser(){
    	if(!empty($this->request->data)){
    		$this->Dashboard->create();
    		if ($this->Dashboard->save($this->request->data)){
    			$this->redirect(array('controller' => 'dashboards', 'action' => 'index', $this->request->data));
    		}else{

    		}
    	}
    }
}