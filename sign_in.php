<?php 
    session_start();
?>
<?php include_once('conn.php'); ?>


<?php 
    if(isset($_POST['submit'])){

        //Declare variable and assign empty values

  
        $email = "";
        $password = "";
        $msg = "";

     
        $email = input_verify($_POST['email']);
        $password = input_verify($_POST['password']);
//Me sql query eken karanne input filed walin enter karana fname and email eka db eke thiynwd kiyala check karana eka
        $query1 = "SELECT * FROM tbl_user WHERE email = '{$email}' AND pwd = '{$password}' LIMIT 1";

        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){
            if(mysqli_num_rows($ShowResult) == 1){

                $user = mysqli_fetch_assoc($ShowResult);
                $_SESSION['User_Fname'] = $user['Fname'];
                $_SESSION['User_Lname'] = $user['Lname'];
                header("Location: index.php");

               
            }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Please check your email or passowrd</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";

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
    <title>Signin</title>
</head>
<body style="background-color: #78C2AD;">
    <?php include_once('navbar.php') ?>


    <div class="container card  bg-light col-5 mt-5">
       
            
                <form action="sign_in.php" method="POST" class="container mt-5 mb-5 ">
                <div class="text-center display-3 mb-5 ">
                        <span class="text-dark">Signin</span>
                    </div>
                    <?php if(!empty($msg)){echo $msg; } ?>

                    <div class="form-group  ">
                        <label class="text-dark ">Email</label>
                        <input type="email" class="form-control " name="email" placeholder="abc@gmail.com">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Password</label>
                        <input type="password" class="form-control " name="password" placeholder="">
                    </div>
                    <div class="text-center col-4 container mt-5">
                    <button type="submit" name="submit" class="btn btn-secondary text-center">Submit</button>
                    </div>
                    </form>
        





       
    </div>

    
</body>
</html>

















                

              
