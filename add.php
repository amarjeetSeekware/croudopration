<?php
if(isset($_POST['submit']) && $_POST['submit']!=''){
   require_once 'dbcon.php';
   $name = (!empty($_POST['name'])) ? $_POST['name'] :'';
   $email = (!empty($_POST['email'])) ? $_POST['email'] :'';
   $designation = (!empty($_POST['designation'])) ? $_POST['designation'] :'';
   $salary = (!empty($_POST['salary'])) ? $_POST['salary'] :'';
   $date = (!empty($_POST['date'])) ? $_POST['date'] :'';
   $id = (!empty($_POST['user_id'])) ? $_POST['user_id'] :'';
// if(!empty($id)){
//     $user_query = "UPDATE  `adddata` SET name='".$name."', email='".$email."',
//     designation='".$designation."',  salary='".$salary."',
//      date='".$date."' WHERE id='".$id."'"; 
//      $msg ="update"; 
// }
// else
// {
   $sql ="INSERT INTO `adddata`( name,email, designation, salary,date)
   VALUES ('".$name."','".$email."','".$designation."','".$salary."','".$date."')";
   $msg ="add";
// }
$result= mysqli_query($con, $sql);
  if($result){
      header('location:index.php?msg='.$msg);
  }
}
if(isset($_GET['id']) && $_GET['id']!=''){
    require_once 'dbcon.php';
    $user_id= $_GET['id'];
    $user_query ="SELECT * FROM `adddata` WHERE id='".$user_id."'";
    $user_result = mysqli_query($con, $user_query);
    $result =mysqli_fetch_row($user_result);
    $name = $result[1];
    $email = $result[2];
    $designation = $result[3];
    $salary = $result[4];
    $date = $result[5];
}
else{
    $name ='';
    $email = '';
    $designation = '';
    $salary = '';
    $date = '';
    $id = '';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
        <form action="" method="post" enctype="multipart/form-data">
                <h2 class="mt-5">Fill Data</h2>
                <p class="hint-text">Fill below form.</p>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $name; ?>" id="name"  name="name"
                        placeholder="Enter your Name" required="true">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" value="<?php echo $email; ?>" id="email"  name="email"
                        placeholder="Enter your Email id" required="true">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="designation"
                        placeholder="Enter your Desigantion" value="<?php echo $designation; ?>" id="designation"  required="true">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="salary"
                        placeholder="Enter your salary" value="<?php echo $salary; ?>" id="salary"  required="true">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" value="<?php echo $date; ?> "id="date"  name="date"
                        placeholder="" required="true">
                </div>


                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>