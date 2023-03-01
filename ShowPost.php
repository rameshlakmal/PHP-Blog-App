<?php session_start(); ?>
<?php include_once('conn.php'); ?>


<?php 
    if(isset($_GET['Post_Id'])){


        $Post_Id = $_GET['Post_Id'];
        $post_title = "";
        $post_body = "";
        $post_create = "";

        $query = "SELECT * FROM tbl_post WHERE Id = {$Post_Id}";

        $ShowPost = mysqli_query($conn,$query);

        if($ShowPost){
            if(mysqli_num_rows($ShowPost) > 0){
                $post = mysqli_fetch_assoc($ShowPost);

                $post_title = $post['Post_Title'];
                $post_body = $post['Post_Body'];
                $post_create = $post['Create_at'];
            }
        }

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
    <link rel="icon" href="article.ico" />
    <title>Show Post</title>
</head>
<body>
    <?php include_once('navbar.php') ?>


    <div class="container ">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card text-white bg-secondary d">


                    <div class="card-header text-center">
                         <h4><?php echo $post_title ; ?></h4>
                    </div>


                    <div class="card-body">
                        <?php echo $post_body ; ?>
                    </div>

                    <div class="card-footer badge badge-primary text-wrap col-2 mt-4">
                        <small ><?php echo $post_create ; ?></small>
                    </div>

                    <div class="text-center">
                        <?php
                            if(isset($_SESSION['User_Fname'])){
                                echo "<a class='btn btn-primary mt-5 mb-5 text-center' href='edit.php?post_id={$Post_Id}'>Edit Post</a>";
                            }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </div>

    
</body>
</html>

















                

              
