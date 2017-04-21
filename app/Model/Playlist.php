<?php
/**
 * Created by PhpStorm.
 * User: buzz
 * Date: 3/23/17
 * Time: 4:17 PM
 */
class Playlist extends AppModel {
    public $primaryKey = '_id';
    public $validate = array(
        'name'=> array(
            'required'=>'true',
            'rule'=>'isUnique'
        )
    );
}