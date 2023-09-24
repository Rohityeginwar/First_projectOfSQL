<?php include('Header.php') ;?> 
        <div class='container'>
                <a href="<?= base_url('Admin/addArtical') ?>" class='btn btn-lg btn-success'>Add Article</a>
        </div>
        <?php if($msg = $this->session->flashdata('msg')):?>


                <?php $class=$this->session->flashdata('msg_class')?>
                    <div class='container'>
                        <div class='row'>
                            <div class='alert <?= $class?>'>
                                <?php echo $msg ;?>
                            </div>
                        </div>
                    </div>
            <?php endif ;?>
       <div class=container>
        <table class='table'>
                <thead>
                        <tr>
                                <th>article title</th>
                                <th>article body</th>
                                <th>username</th>
                                <th>Edit</th>
                                <th>Delete</th>
                        </tr>
                </thead>
                <tbody>
                        <?php if(count($art)):?>
                        <?php foreach($art as $arts):?>
                        <tr>
                                <td><?php echo $arts['article_title'] ;?></td>
                                <td><?php echo $arts['article_body'] ;?></td>
                                <td><?php echo $arts['username'] ;?></td>
                                <td><a href="<?= base_url('Admin/editArticle') ?>" class="btn btn-primary">Edit</a></td>
                                <td>
                                <?=
                                form_open('Admin/delete'),
                                form_hidden('username',$arts['username'] ),
                                form_submit(['name'=>'submit','value'=>'delete','class'=>'btn btn-danger']),
                                form_close();
                                ?>        
                                </td>
                        </tr>
                        <?php endforeach ;?>
                        <?php else:?>
                                <tr>
                                        <td>data not found</td>
                                </tr>
                        <?php endif ;?>
                </tbody>
                <?= $this->pagination->create_links($arts);?>
        </table>
        <?= $this->pagination->create_links($arts);?>
        </div>
<?php include('footer.php') ;?> 