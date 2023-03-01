<?php 
    session_start();
?>
<?php include_once('conn.php'); ?>
<?php 
    $postbody = "";

    $query = "SELECT * FROM tbl_post";

    $showPost = mysqli_query($conn,$query);

    if($showPost){
        if(mysqli_num_rows($showPost) > 0){
            while($post = mysqli_fetch_assoc($showPost)){


            $postbody .= "<a class='text-decoration-none' href='ShowPost.php?Post_Id={$post['Id']}'>"; 
                $postbody .= "<div class = 'card text-white bg-secondary mb-3 p-5 mt-5 text-decoration-none' >";

                    $postbody .= "<h1 id='title'>";
                        $postbody .= "{$post['Post_Title']}";
                    $postbody .= "</h1>";

                    $postbody .= "<div id='body'>";
                        $postbody .= "{$post['Post_Srt_Nt']}";
                    $postbody .= "</div>";

                    $postbody .= "<div class='badge badge-primary text-wrap col-2 mt-4'>";
                       $postbody .= "<small>";
                            $postbody .= "Created at {$post['Create_at']}";
                       $postbody .= "</small>";
                    $postbody .= "</div>";

                $postbody .= "</div>";
            $postbody .= "</a>";


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css" integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous">    <script src="jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="icon" href="article.ico" />
    <title>Blog App</title>

    <style> 

body{
    background-color: #78C2AD;
}

    </style>
</head>

<body>
    <?php include_once('navbar.php') ?>





<div class="card text-white bg-light mb-3 container text-center mt-5 ">
  <div class="card-body mt-5 mb-5">
    <h4 class="card-title display-4 text-dark">Welcome to the DevTubes</h4>
    <h4 class="h1 display-4">👾🧑🏻‍💻👾</h4>
  </div>
</div>






<div class="card bg-light mb-4 mt-5 container">
  <div class="card-body">
  <div class="text-center display-3 mb-3">
                        <span>Blog Articles</span>
                    </div>
        <div>
            <?php 
                echo $postbody ;
            ?>
        </div>
  </div>
</div>



</body>
</html>