<?php
    

    $conn = mysqli_connect("b1xritloikzzvusjysx8-mysql.services.clever-cloud.com","uge5h2oncmvtgrjz","Skfaz0om2c3NX4BfqJcb","b1xritloikzzvusjysx8");   //inbuild function database ekath ekk connection ekk create karnw 
                                                                        //connection eka hadagann oni karana dewal thama uda define 
                                                                        //karala thiyenne ewa tika arguments widhiyt me inbuild function
                                                                        //ekt pass karanawa
    if(!$conn){
        die("Database Connection Failed...!" . mysqli_error($conn));
    }else{
        // echo "Database Connection Successfull...!";
    }
?>