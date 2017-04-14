
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Level 2 - Around Town</small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <div class="carousel slide media-carousel" id="media2">
            <div class="carousel-inner">

                <?php
                $count= count($resultsLv2);
                $k = (int)($count/4);
                for($i=0; $i<=$k; $i++):
                    ?>
                    <div class="item <?php echo ($i==0)?'active':''; ?>">
                        <div class="row">
                            <?php for($j=0; 4*$i+$j<$count && $j<4; $j++):?>
                                <div class="col-md-3">
                                    <a href="#" class="thumbnail">
                                        <?php
                                        echo $this->Html->image($resultsLv2[4*$i+$j]['Playlist']['image'], array(
                                            'width'=>'200px',
                                            'alt'=>'can not load image',
                                        ))?>
                                    </a>
                                    <a href="#"><?php echo $resultsLv2[4*$i+$j]['Playlist']['name']?></a>
                                </div>
                            <?php endfor ?>
                        </div>
                    </div>
                <?php endfor ?>

            </div>
            <a data-slide="prev" href="#media2" class="left carousel-control col-md-1">‹</a>
            <a data-slide="next" href="#media2" class="right carousel-control col-md-1">›</a>
        </div>

    </div>
    <div class="1"></div>
</div>


