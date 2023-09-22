<style>
    .red{
        color:red;
    }

    label{
        font-size:30px;
        margin-bottom:1%;
    }
</style>
<?php include('Header.php') ;?> 
        <div class='container'>
            <h1>Add Article</h1>
            <?php echo form_open('Admin/userValidation');?>
            <?php echo form_hidden('UserName',$this->session->userdata('name')) ;?>
                <div class='form-group margin' >
                    <label for="title" class="control-label">Article Title</label>
                    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Article Title','name'=>'article_title','type'=>'text','value'=>set_value('article_title')]);?>
                    <div class='red'>
                        <?php echo form_error('article_title') ;?>
                    </div>
                </div>
                <div class='form-group margin' >
                    <label for="body" class="control-label">Article Body</label>
                    <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter Article Body','name'=>'article_body','type'=>'body','value'=>set_value('article_body')]);?>
                    <div class='red'>
                        <?php echo form_error('article_body') ;?>
                    </div>
                </div>
                <?php echo form_submit(['type'=>'submit','value'=>'submit']);?>
        </div>
<?php include('footer.php') ;?>

