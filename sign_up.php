<?php include_once('conn.php'); ?>


<?php 
    if(isset($_POST['submit'])){

        //Declare variable and assign empty values

        $fname = "";
        $lname = "";
        $email = "";
        $password = "";
        $msg = "";

        $fname = input_verify($_POST['fname']);
        $lname = input_verify($_POST['lname']);
        $email = input_verify($_POST['email']);
        $password = input_verify($_POST['password']);
//Me sql query eken karanne input filed walin enter karana fname and email eka db eke thiynwd kiyala check karana eka
        $query1 = "SELECT * FROM tbl_user WHERE Fname = '{$fname}' AND email = '{$email}' ";

        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){
            if(mysqli_num_rows($ShowResult) == 1){

                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>User Alredy existi</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";

            }else{
                $query = "INSERT INTO tbl_user(Fname,Lname,email,pwd,Reg_DT) VALUES(
                    '{$fname}' , '{$lname}' , '{$email}' , '{$password}' , NOW()
                )";
                
                $result = mysqli_query($conn, $query);  //mysqli_query kiyn inbuilt bunc ekt db con
                                                        // eki liypu sql query ekai pass karagena e func
                                                        // eka assign karagannawa variable ekakata
                
                if($result){
                    $msg = "<div class='alert alert-dismissible alert-info fade show' role='alert'>
                                <strong>User Registration Success</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                }else{
                    echo mysqli_error($conn);
                }
            }
        }
        


    }

    function input_verify($data){
        $data = trim($data);// text filed wala input eke issarahin pitipassahin thiyana empty space ek ain karanawa
        $data = stripcslashes($data);//user input filed wala backslash eka gahuwoth ain wenw
        $data = htmlspecialchars($data);//special characters wenm entities walata convert karanawa
       
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">    
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="icon" href="article.ico" />
    <title>Sign Up</title>
</head>
<body>
    <?php include_once('navbar.php') ?>


    <div class="container card text-white bg-primary col-6 mt-5">
       
            
                <form action="sign_up.php" method="POST" class="text-white container mt-3 mb-5">
                    <div class="text-center display-3 mb-3">
                        <span>SignUp</span>
                    </div>
                    <?php if(!empty($msg)){echo $msg; } ?>
                    <div class="form-group ">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="Jhon">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Cena">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="abc@gmail.com">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="">
                    </div>
                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-secondary mt-3">Submit</button>
                    </div>
                    </form>
     
    </div>

    
</body>
</html>

















                

              
