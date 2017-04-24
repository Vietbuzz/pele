<script>
    function isDelete (msg){
        if (window.confirm(msg)){
            return true;
        }
        return false;
    }
</script>
<div class="posts form">
    <?php echo $this->Form->create('Playlist' , array( 'type' => 'file' ));?>
    <fieldset>
        <legend><?php __('Edit Playlist');?></legend>
        <?php echo $this->Form->hidden('_id'); ?>
        <div class="form-group">
            <?php echo $this->Form->input('level', array(
                "class"=>"form-control",
                "options"=>array(1=>1, 2=>2, 3=>3),
                "default"=>$this->data['Playlist']['level'])); ?>
        </div>
        <div class="form-group">
             <?php echo $this->Form->input('name', array("class"=>"form-control")); ?>
        </div>
        <div class="form-group">
            <?php
            echo $this->Form->input('description',
                array("class"=>"form-control", "type"=>"textarea", "rows"=>3)
            );
            ?>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="parts">
                <h2 class="page-header">Parts
                </h2>
                <?php foreach($this->Form->data['Playlist']['text'] as $key=>$text):?>
                    <div class="part">
                        <?php echo $this->Html->media($this->data["Playlist"]["name"]."/".$this->data["Playlist"]["audio"][$key], array( 'controls', 'id'=>'audio'))?>
                        <?php echo $this->Form->input('Playlist.audio.'.($key), array(
                            'type'=>'file',
                            'between'=>'<br />',
                            'class' => 'form-control',
                            'label'=> 'change audio '.($key +1),
                            'required'=>false,
                        )); ?>
                        <div class="form-group">
                            <label>Text <?php echo $key +1?></label>
                            <?php echo $this->Form->textarea('Playlist.text.'.($key), array(
                                'rows' => 3,
                                'class' => 'form-control',
                            ))?>
                        </div>
                    </div>
                    <br><br>
                <?php endforeach;?>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <div class="row"><div id="addpart"><h4><strong>Add new part</strong></h4></div></div>
        <br><br>

        <?php

        pr($this->Form->data['Playlist']['level']);
        pr($this->Form->data);
        $temp = $this->request->data;
        ?>
    </fieldset>
    <?php echo $this->Form->end('Submit');?>
    <button>
        <?php echo $this->Html->link(__('List Playlist', true), array(
            'action'=>'admin_list'
        ));?>
    </button>
</div>


