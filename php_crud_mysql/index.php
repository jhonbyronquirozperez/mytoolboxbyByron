<?php include("db.php") ?>
<?php include("includes/header.php") ?>
    

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">


            <?php if(isset($_SESSION['message']))  { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>



            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-controler" placeholder="task title" autofocus>
                        
                    </div>
                    <div class="form-group m-2">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="save task">
                   
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";
                    $result_task = mysqli_query($conn,$query);


                    while($row = mysqli_fetch_array($result_task)){ ?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created_at']?></td>

                            <td>
                                <a href="edit.php?id=<?php  echo $row['id']?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="delete_task.php?id=<?php  echo $row['id']?>" class="btn btn-danger"><i class="bi bi-trash-fill "></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    
<?php include("includes/footer.php") ?>