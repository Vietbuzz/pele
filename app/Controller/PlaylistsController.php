<?php
/**
 * Created by PhpStorm.
 * User: buzz
 * Date: 3/23/17
 * Time: 9:22 AM
 */

class PlaylistsController extends AppController
{
//frontend---------------------------------------------------------
    public function home()
    {
        $paramsLv1 = array(
            'fields'=>array('name', 'level','image', 'description'),
            'order'=>array('_id'=>1),
            'conditions' => array('level'=>'1')
        );

        $paramsLv2 = array(
            'fields'=>array('name', 'level','image', 'description'),
            'order'=>array('_id'=>-1),
            'conditions' => array('level'=>'2')
        );

        $paramsLv3 = array(
            'fields'=>array('name', 'level','image', 'description'),
            'order'=>array('_id'=>-1),
            'conditions' => array('level'=>'3')
        );

        $resultsLv1= $this->Playlist->find('all', $paramsLv1);
        $resultsLv2= $this->Playlist->find('all', $paramsLv2);
        $resultsLv3= $this->Playlist->find('all', $paramsLv3);
        $this->set(compact('resultsLv1', 'resultsLv2', 'resultsLv3'));
    }


    public function practice($id = null){
        $playlist = $this->Playlist->find('first','_id');
        $this->set('playlist', $playlist);
    }

//admin-----------------------------------------------
    public function admin_list()
    {
        $this->layout = 'admin';
        $params = array(
            'fields'=>array('name', 'level', 'description'),
            'order' => array('_id'=> -1),
        );
        $results = $this->Playlist->find('all', $params);
        $this->set(compact('results'));
        //exit;
    }

    /**
     * action add playlist
     * return void
     */
    public function admin_add()
    {
        $this->layout = 'admin';
        if (!empty($this->data)) {
            //retype data
            if(!empty($this->data['Playlist']["image"]["name"])){
                $imageFile = $this->request->data["Playlist"]['image'];
                //$imageFile = new File($this->request->data["Playlist"]["image"]['tmp_name']);
                pr($imageFile);
                if($this->uploadData("files/"."/img", array("jpg", "png"), $imageFile)){
                    echo 'ok';
                    $this->request->data['Playlist']["image"]= "files/img/".$this->request->data['Playlist']["image"]["name"];
                }else{
                    //pr($this->uploadData("Playlist/img", array("jpg", "png"), $imageFile)) ;
                }
            }else{
                echo "không có ";
                $this->request->data['Playlist']["image"]= "";
            }
            foreach($this->request->data["Playlist"]['audio'] as $key => $audio){
                if(!empty($audio["name"])){
                    //$imageFile = $this->request->data["Playlist"]['image'];
                    //$imageFile = new File($this->request->data["Playlist"]["image"]['tmp_name']);
                    pr($audio);
                    $this->uploadData("files/".$this->data["Playlist"]["name"], array("mp3", "wav"), $audio);
                }
                $this->request->data["Playlist"]["audio"][$key] = $this->request->data["Playlist"]["audio"][$key]["name"];
            }
            pr($this->request->data);

            $this->Playlist->create();
            if ($this->Playlist->save($this->data)) {
                $this->flash(__('Post saved.', true), array('action' => 'list',));
                $this->redirect(array("action"=>"admin_list"));
            } else {
            }
        }
    }

    public function uploadData($folder =null, $tail =[], $file){
        $file_name =$file["name"];
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
        if(in_array($ext, $tail)){
            if(!is_dir($folder) && !mkdir($folder))
            {
                pr($folder);
                return false;
            } else {
                move_uploaded_file($file['tmp_name'], WWW_ROOT .$folder.'/'.$file['name']);
                return true;
            }
        } else{
            $this->Session->setFlash(__('Image file for playlist is invailid, Please put an jpg or png file.'));
            return false;
        }

    }


    /**
     * action edit playlist
     * @param null $id
     *
     */
    public function admin_edit($id = null) {
        $this->layout = 'admin';
        if (!$id && empty($this->data)) {
            $this->flash(__('Invalid Playlist', true), array('action' => 'admin_list'));
        }
        if (!empty($this->data)) {
            if ($this->Playlist->save($this->data)) {
                $this->redirect(array("action"=>"admin_list"));
            } else {
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Playlist->read(null, $id);
            //$this->data = $this->Post->find('first', array('conditions' => array('_id' => $id)));
        }
    }

    /**
     * action delete Playlist
     * @param null $id
     */

    public function admin_delete($id = null){
        if (!$id) {
            $this->flash(__('Invalid Playlist', true), array('action' => 'admin_list'));
        }
        if ($this->Playlist->delete($id)) {
            $this->redirect(array("action"=>"admin_list"));
        } else {
            $this->flash(__('Playlist deleted Fail', true), array('action' => 'admin_list'));
        }
    }
}