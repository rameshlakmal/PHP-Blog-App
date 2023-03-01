<?php 
    session_start();
?>
<?php include_once('conn.php'); ?>

<?php include_once('navbar.php') ?>


<?php
    if(!isset($_SESSION['User_Fname'])){
        header("Location: index.php");
    }
?>

<?php
    if(isset($_POST['submit'])){
        //Define and sign valuse for the variables
        $post_title =input_verify($_POST['title']);
        $post_body = input_verify($_POST['Post_body']);
        $Post_srt_nt = input_verify($_POST['Shrt_Nt']);

        //Build db insert query

        $query = "INSERT INTO tbl_post(Post_title,Post_Srt_Nt,Create_at,Post_body) VALUES ('{$post_title}','{$Post_srt_nt}', NOW(),'{$post_body}')";

        $result = mysqli_query($conn,$query);

        if($result){
            $msg = "<div class='alert alert-secondary alert-dismissible fade show mt-5' role='alert'>
                        <strong>Your post is visible now</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
        }else{
            echo "Post not Created". mysqli_error($conn);
        }

    }

    
    function input_verify($data){
        $data = trim($data);// text filed wala input eke issarahin pitipassahin thiyana empty space ek ain karanawa
        $data = stripcslashes($data);//user input filed wala backslash eka gahuwoth ain wenw
        $data = html_entity_decode($data);//special characters wenm entities walata convert karanawa
       
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
    <link rel="icon" href="article.ico" />
    <title>Create Post</title>
</head>
<body style="background-color: #F3969A;">



    <div class="container card text-white bg-primary mb-3 mt-5">

                <form action="create_post.php" method="POST">
                    <?php if(!empty($msg)){echo $msg; } ?>

                        <div class="form-group mt-5">
                          <h4><label class="text-light" for="">Title</label></h4>
                          <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group mt-5">
                           <h4><label class="text-light" for="">Short Note</label></h4> 
                            <textarea class="form-control" name="Shrt_Nt" id="Shrt_Nt" rows="5"></textarea>
                          </div>

                       
                          <div class="form-group mt-5">
                           <h4><label class="text-light" for="">Post Content</label></h4> 
                            <script src="ckeditor.js"></script>
                            <textarea class="form-control" name="Post_body" id="Post_body" rows="15"></textarea>
                            <script>
                                CKEDITOR.replace('Post_body');
                            </script>
                          </div>

                    <div class="text-center mt-5 mb-3">
                        <button type="submit" name="submit" class="btn btn-light">Submit</button>
                    </div>
                    </form>

    </div>

    
</body>
</html>
