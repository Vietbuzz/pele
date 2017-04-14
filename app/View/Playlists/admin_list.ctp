

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Playlist
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th style="text-align: center">NO</th>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">Level</th>
            <th style="text-align: center">Description</th>
            <th colspan="2" style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
        <?php foreach($results as $result):?>
        <tr class=<?php echo ($i%2==0)?'odd gradeX':'even gradeC'?> align="center">
            <td><?php echo ++$i?></td>
            <td><?php echo $result['Playlist']['name'];?></td>
            <td><?php echo $result['Playlist']['level'];?></td>
            <td><?php echo $result['Playlist']['description'];?></td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><?php echo $this->Html->link('delete','delete/'.$result['Playlist']['_id']); ?></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i><?php echo $this->Html->link('Edit','edit/'.$result['Playlist']['_id']); ?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php
    pr(count($results));
    ?>
</div>


