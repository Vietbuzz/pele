<div class="row posts form">
    <div class="col-lg-12">
        <h1 class="page-header">Playlist
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <?php echo $this->Form->create('Playlist', array('type'=>'file', 'action'=>'admin_add'))?>
            <div class="form-group">
                <?php echo $this->Form->input('level', array(
                    'options' => array(1=>1, 2=>2, 3=>3),
                    'class' => 'form-control'
                ))?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', array(
                    'type' => 'text',
                    'class' => 'form-control'
                ))?>
            </div>


            <div class="form-group">
            <?php echo $this->Form->input('image', array(
                'type'=>'file',
                'between'=>'<br />',
                'class' => 'form-control'
            )); ?>
            </div>
            <div class="form-group" name="abcxyz">
                <label>Description</label>
                <?php echo $this->Form->textarea('description', array(
                    'rows' => 5,
                    'class' => 'form-control',
                    'label' => 'Description'
                ))?>
            </div>

        <!-- List of parts in this playlist-->
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <h2 class="page-header">Parts
                </h2>
                <?php for ($partnum=0; $partnum<5; $partnum++):?>

                    <?php echo $this->Form->input('Playlist.audio.'.($partnum), array(
                        'type'=>'file',
                        'between'=>'<br />',
                        'class' => 'form-control',
                        'label'=> 'audio '.($partnum +1)
                    )); ?>
                    <div class="form-group">
                        <label>Text <?php echo $partnum +1?></label>
                        <?php echo $this->Form->textarea('Playlist.text.'.($partnum), array(
                            'rows' => 3,
                            'class' => 'form-control',
                        ))?>
                    </div>
                    <br><br>
                <?php endfor?>
            </div>


        <?php echo $this->Form->end('Submit');?>
        <?php pr($this->request->data);?>
    </div>
</div>