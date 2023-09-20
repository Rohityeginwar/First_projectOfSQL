<?php include('Header.php') ;?> 
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
                                <td><a href="#" class="btn btn-primary">Edit</a></td>
                                <td><a href="#" class="btn btn-danger">delete</a></td>
                        </tr>
                        <?php endforeach ;?>
                        <?php else:?>
                                <tr>
                                        <td>data not found</td>
                                </tr>
                        <?php endif ;?>
                </tbody>
        </table>
        </div>
<?php include('footer.php') ;?> 