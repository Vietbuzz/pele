<script>
    function isDelete (msg){
        if (window.confirm(msg)){
            return true
        }
        ;return false
    }
</script>
<div class="posts form">
    <?php echo $this->Form->create('Playlist' , array( 'type' => 'post' ));?>
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
        <?php

        pr(
            $this->Form->data['Playlist']['level']
        );
        ?>
    </fieldset>
    <?php echo $this->Form->end('Submit');?>
    <button>
        <?php echo $this->Html->link(__('List Playlist', true), array(
            'action'=>'admin_list'
        ));?>
    </button>
</div>


