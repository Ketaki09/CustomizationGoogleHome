<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: application/json');

        define('DB_USER', ""); // db user
        define('DB_PASSWORD', ""); // db password (mention your db password here)
        define('DB_DATABASE', ""); // database name
        define('DB_SERVER', "localhost"); // db server

//define('DB_USER', "root"); // db user
//        define('DB_PASSWORD', "root"); // db password (mention your db password here)
//        define('DB_DATABASE', "tweetLamp"); // database name
//        define('DB_SERVER', "localhost"); // db server

        // Connecting to mysql database
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) ;
 
        // Selecting database
        $db = mysql_select_db(DB_DATABASE);
       
        
        if($_SERVER['REQUEST_METHOD']=='GET'){
            
            if( isset($_GET['time']) )
            {
                
                $time = $_GET['time'];
                if( isset($_GET['phrase']))
                {
                    $phrase = $_GET['phrase'];
                }
                else
                {
                    $phrase='';
                }
                if( isset($_GET['draft']))
                {
                    $draft = $_GET['draft'];
                }
                else
                {
                    $draft='';
                }
                $update=mysql_query("UPDATE actions SET action_time='$time',phrase='$phrase',draft='$draft' WHERE 1=1");
                // echo "<script language=\"javascript\">window.location.href = \"index.php\"</script>"; 
                mysql_close();
        
        }
        else 
        {
            $response["success"] = 0;
            $response["message"] = "some parameter(s) are missing";
            $response["time"] = $_GET['time'];
            header('Content-Type: application/json');
            // echoing JSON response
            echo json_encode($response);
        }
}
else{

    $response["success"] = -1;
    $response["message"] = "Improper request no GET request found";
    header('Content-Type: application/json');
    // echoing JSON response
    echo json_encode($response);

}
?>