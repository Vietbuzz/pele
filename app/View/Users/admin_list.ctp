<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>List</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th style="text-align: center">No</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">FullName</th>
            <th style="text-align: center">Password</th>
            <th style="text-align: center">DoB</th>
            <th colspan="2" style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;?>
        <?php foreach($results as $result):?>
        <tr class=<?php echo ($i%2==0)?'odd gradeX':'even gradeC'?> align="center">
            <td><?php echo ++$i?></td>
           <!--  <td><?php echo $this->Form->hidden($result['User']['username']);?></td> -->
            <td><?php echo $result['User']['username'];?></td>
            <td><?php echo $result['User']['fullname'];?></td>
            <td><?php echo $result['User']['password'];?></td>
            <td><?php echo $result['User']['dob'];?></td>
          <!--   <td class="center"><a href="#"> Edit</a></td> -->
            <td class="actions"> 
                <?php echo $this->Html->link("Edit", array('action' => 'edit'), $result['User']['_id']); ?> 
            </td>
             <td class="actions"> 
                <?php echo $this->Html->link("Delete", array('action'=>'delete', $result['User']['_id'])); ?>
            </td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>


