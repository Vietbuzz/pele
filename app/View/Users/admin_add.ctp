
<div class="row posts form">
    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>Add</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <?php echo $this->Form->create('User' , array( 'type' => 'user', 'action'=>'add' ));?>
           <div class="form-group">
                <label>Username</label>
                <input class="form-control" name="username" placeholder="Please Enter Username " />
            </div>
            <div class="form-group">
                <label>FullName</label>
                <input class="form-control" name="fullname" placeholder="Please Enter FullName" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" type = "password" placeholder="Please Enter Password" />
            </div>
            <div class="form-group" name="abcxyz">
                <label>DoB</label>
              <input class="form-control" name="dob" type = "date" />
            </div>
           
        <?php echo $this->Form->end('Submit');?>
    </div>
</div>