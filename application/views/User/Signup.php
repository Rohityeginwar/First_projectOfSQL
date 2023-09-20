<?php include ('Header.php') ;?>
<div class='container'>
            <h1>Sign-up</h1>
            <?php echo form_open('admin/register');?>
                <div class='form-group  margin' >
                    <label for="Name" class="control-label">Name</label>
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'user name','name'=>'uname','value'=>set_value('uname'),'required']);?>
                    <div class=red>
                        <?php echo form_error('uname');?>
                    </div>
                </div>
                <div class='form-group margin' >
                    <label for="email" class="control-label">Email</label>
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'email@gmail.com','name'=>'email','value'=>set_value('email')]);?>
                    <div class=red>
                        <?php echo form_error('email') ;?>
                    </div>
                </div>
                <div class='form-group margin' >
                    <label for="password" class="control-label">Password</label>
                    <?php echo form_password(['class'=>'form-control','placeholder'=>'password','name'=>'pass','type'=>'password','value'=>set_value('pass')]);?>
                    <div class=red>
                        <?php echo form_error('pass') ;?>
                    </div>
                </div>
                <?php echo form_submit(['type'=>'submit','value'=>'submit']);?>
        </div>
<?php include ('footer.php') ;?>