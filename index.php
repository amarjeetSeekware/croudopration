<?php
require_once 'dbcon.php';
$query = "SELECT * FROM `adddata`";
$result =mysqli_query($con, $query);
$records= mysqli_num_rows($result);
$msg ="";
if(!empty($_GET['msg'])){
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add")? "New Record has been added successfully!" : (($msg == "del")? 
    "Record has been deleted successfully!" : "New Record has been update successfully!");

}
else{
    $alert_msg ="";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <?php if(!empty($alert_msg)) {?>
            <div class="alert alert-success mt-5"><?php echo $alert_msg; ?></div>
        <?php }?>
        <a href="add.php" class="btn btn-primary"> Add Data</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Desigantion</th>
                    <th scope="col">salary</th>
                    <th scope="col">Date</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
      if(!empty($records)){
          while($row = mysqli_fetch_assoc($result)){
              ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <a href="/crudopration/add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="/crudopration/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" 
                        onClick="javascript:return confirm ('Do you really want to delete?'); ">Delete</a>
                    </td>
                </tr>
                <?php
                }
                }
               ?>
            </tbody>
        </table>


    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>