
<div class="row posts form">
    <div class="col-lg-1"></div>
    <div class="col-md-6">
        <?php echo $this->Form->create('User' , array( 'type' => 'post' ));?>
        <fieldset>
            <legend><?php __('User Information');?></legend>
            <?php echo $this->Form->hidden('_id'); ?>
            <div class="form-group">
                <?php echo $this->Form->input('username', array(
                    "class"=>"form-control",
                    "disabled"=> true,
                )); ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->input('fullname', array("class"=>"form-control")
                );
                ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('gender', array(
                    "class"=>"form-control",
                    "options"=>array('male'=>'male', 'female'=>'female'),
                    "default"=>$this->data['User']['gender'])); ?>
            </div>

            <div class="form-group">
                <?php
                echo $this->Form->input('age', array(
                        "class"=>"form-control",
                        'type' => 'number'
                    )
                );
                ?>
            </div>

            <div class="form-group">
                <?php echo $this->Form->hidden('role', array(
                    "class"=>"form-control",
                    'value' => 'user',
                    "default"=>$this->data['User']['role'])); ?>
            </div>
            <?php
            $temp = $this->request->data;
            ?>
        </fieldset>
        <?php echo $this->Form->end('Submit');?>
    </div>
    <div class="col-md-1"> </div>
    <div class="col-md-4 fa-border">
        <h4 class="text-warning">Your History</h4>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10"><?php foreach ($playlists as  $playlist): ?>
                    <?php $playlistId = $playlist["Playlist"]["_id"];?>
                    <h5><?php echo $this->Html->link($playlist["Playlist"]["name"],'#') ?></h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="info">
                            <?php foreach ($playlist["Playlist"]["text"] as $partkey =>$part): ?>
                                <th>Part <?php echo($partkey + 1)?></th>
                            <?php endforeach;?>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php foreach ($playlist["Playlist"]["text"] as $partkey =>$part): ?>
                                <td> <?php
                                    if(isset($user_info["User"]["history"][$playlistId][$partkey])){
                                        echo $user_info["User"]["history"][$playlistId][$partkey];
                                    } else {
                                        echo "";
                                    }

                                    ?>
                                </td>
                            <?php endforeach;?>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                <?php endforeach;?></div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>