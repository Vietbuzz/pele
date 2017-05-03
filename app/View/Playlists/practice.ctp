<div class="row">
    <div class="col-lg-12"><h2><span class="text-warning">Practice/</span> <span class="text-info"><?php echo $playlist["Playlist"]["name"]?></span></h2></div>
</div>
<div class="row">
    <script>
    </script>
    <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item disabled">
                Same Level
                <?php
                    echo $playlist["Playlist"]["level"];
                ?>
            </a>
            <?php foreach($relate  as $item):?>
                <?php echo $this->Html->link($item["Playlist"]["name"], '/playlists/practice/'.$item["Playlist"]["_id"], array(
                    'class'=>'list-group-item'
                ))?>
            <?php endforeach;?>
        </div>
    </div>
    <div class="col-lg-6 center">
        <?php echo $this->Html->media($playlist["Playlist"]["name"]."/".$playlist["Playlist"]["audio"][0], array( 'controls', 'loop', 'id'=>'audio'))?>
        <br>
        <input class="form-control" id="typingText" type="text" size="40" onkeydown="myFunction(event)" disabled>
        <input type="hidden" id="idPlaylist" value="<?php echo $playlist["Playlist"]["_id"]?>">
        <input type="hidden" id="baseUrl" value="<?php echo Router::url('/')?>" >

        <p id="demo"></p>
        <br>
        <table class="table">
            <tr id="originrow">
                <td><div>True Text: </div></td>
            </tr>
            <tr id="yourrow">
                <td><div>Your Text: </div></td>
            </tr>
        </table>
        <div id="testtext"></div>
        <div id="testchar"></div>
    </div>
    <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item disabled">
                List Of Parts
            </a>
            <?php foreach($playlist["Playlist"]["text"] as $key=>$text): ?>
                <?php if(!empty($playlist["Playlist"]["audio"][$key])):?>
                <a href="#" class="list-group-item ducatipart" id="<?php echo $key?>" idPlaylist="<?php echo $playlist["Playlist"]["_id"]?>">
                    part <?php echo $key+1?>
                    <input type="checkbox" disabled>
                    <span class="lastPoint"> <?php echo (isset($userHistory[$key]))? $userHistory[$key] : "";  ?></span>
                </a>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php echo $this->Html->script('myscript'); ?>
<?php
?>