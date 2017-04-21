
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Level 1 - Small Talk</small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <div class="carousel slide media-carousel" id="media">
            <div class="carousel-inner">
                <?php
                $count= count($resultsLv1);
                $k = CEIL($count/4);
                for($i=0; $i<$k; $i++):
                ?>
                <div class="item <?php echo ($i==0)?'active':''; ?>">
                    <div class="row">
                        <?php for($j=0; 4*$i+$j<$count && $j<4; $j++):?>
                        <div class="col-md-3">
                            <a href="practice/<?php echo $resultsLv1[4*$i+$j]['Playlist']['_id'] ?>" class="thumbnail">
                                <?php
                                echo $this->Html->image("../".$resultsLv1[4*$i+$j]['Playlist']['image'], array(
                                    'width'=>'200px',
                                    'height'=>'150px',
                                    'alt'=>'can not load image',
                                ))?>
                            </a>
                            <a href="#"><?php echo $resultsLv1[4*$i+$j]['Playlist']['name']?></a>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
                <?php endfor ?>
            </div>
            <a data-slide="prev" href="#media" class="left carousel-control col-md-1">‹</a>
            <a data-slide="next" href="#media" class="right carousel-control col-md-1">›</a>
        </div>

    </div>
    <div class="col-md-3"><?php //pr($resultsLv1); ?></div>
</div>


