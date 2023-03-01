<?php session_start(); ?>
<?php include_once('conn.php'); ?>


<?php 
    if(isset($_GET['post_id'])){


        $Post_Id = $_GET['post_id'];
        $post_title = "";
        $post_sn = "";
        $post_create = "";
        $post_body = ""; 

        $query = "SELECT * FROM tbl_post WHERE Id = {$Post_Id}";

        $ShowPost = mysqli_query($conn,$query);

        if($ShowPost){
            if(mysqli_num_rows($ShowPost) > 0){
                $post = mysqli_fetch_assoc($ShowPost);

                $post_title = $post['Post_Title'];
                $post_sn = $post['Post_Srt_Nt'];
                $post_create = $post['Create_at'];
                $post_body = $post['Post_Body'];
            }
        }

    }
?>

<?php 
    if(isset($_POST['submit'])){

        $Post_Id = $_GET['post_id'];
        $post_title = $_POST['title'];
        $post_body = $_POST['Post_body'];
        $post_sn = $_POST['Shrt_Nt'];
        
        

        $query = "UPDATE tbl_post SET 
                 Post_Title = '{$post_title}',
                 Post_Srt_Nt = '{$post_sn}',
                 Post_Body = '{$post_body}' WHERE Id = {$Post_Id} ";

                 $result = mysqli_query($conn,$query);

                 if($result){
                    $msg = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                <strong>Post updated succsess</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                 }else{
                    echo mysqli_errno($conn);
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
    <title>Edit Post</title>
</head>
<body style="background-color: #78C2AD;">
<?php include_once('navbar.php') ?>


    <div class="container card text-white bg-secondary mb-3 mt-5">
    <div class="text-center display-3 mb-3">
                        <span>Update your Blog Article</span>
                    </div>
                <form action="edit.php?post_id=<?php echo $Post_Id; ?>" method="POST">
                    <?php if(!empty($msg)){echo $msg; } ?>

                        <div class="form-group mt-5">
                        <h4><label class="text-light" for="">Title</label></h4>
                          <input type="text" name="title" id="title" class="form-control" value="<?php echo $post_title; ?>" >
                        </div>

                        <div class="form-group mt-5">
                        <h4><label class="text-light" for="">Short Note</label></h4> 
                            <textarea class="form-control" name="Shrt_Nt" id="Shrt_Nt" rows="5"> <?php echo $post_sn; ?></textarea>
                          </div>

                       
                          <div class="form-group mt-5">
                          <h4><label class="text-light" for="">Post Content</label></h4> 
                            <script src="ckeditor.js"></script>
                            <textarea class="form-control" name="Post_body" id="Post_body" rows="15"><?php echo $post_body; ?></textarea>
                            <script>
                                CKEDITOR.replace('Post_body');
                            </script>
                          </div>


                   
                    <div class="text-center mt-5 mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>

    </div>

    
</body>
</html>
