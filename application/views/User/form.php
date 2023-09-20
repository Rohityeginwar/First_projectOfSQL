<style>
    .red{
        color:red;
    }
</style>
<?php include('Header.php') ;?> 
        <div class='container'>
            <h1>LOG-IN</h1>

            <?php if($error = $this->session->flashdata('login_failed')):?>
                    <div class='container'>
                        <div class='row'>
                            <div class='alert alert-danger'>
                                <?php echo $error ;?>
                            </div>
                        </div>
                    </div>
            <?php endif ;?>
            <?php echo form_open('admin/intro');?>
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
<?php include('footer.php') ;?>

