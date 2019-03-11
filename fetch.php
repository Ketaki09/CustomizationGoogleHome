<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

header('Content-Type: application/json');

        define('DB_USER', "id7381588_tushakale"); // db user
        define('DB_PASSWORD', "qwertyuiop"); // db password (mention your db password here)
        define('DB_DATABASE', "id7381588_actions_db"); // database name
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
            
            // if( isset($_POST['time']))
            
                
                // $time = $_POST['time'];
                // $update=mysql_query("UPDATE actions SET action_time='$time' WHERE 1=1");
                // echo "<script language=\"javascript\">window.location.href = \"index.php\"</script>"; 
                $query=mysql_query("SELECT * FROM actions");
                $row=mysql_fetch_array($query);
                $time=$row["action_time"];
                $phrase=$row["phrase"];
                $draft=$row["draft"];

                mysql_close();
        

        
    
            $response["success"] = 1;
            $response["message"] = "Opened Word16";
            $response["time"] = $time;
            $response["phrase"] = $phrase;
            $response["draft"] = $draft;
            header('Content-Type: application/json');
            // echoing JSON response
            echo json_encode($response);
        
}
else{

    $response["success"] = -1;
    $response["message"] = "Improper request no GET request found";
    header('Content-Type: application/json');
    // echoing JSON response
    echo json_encode($response);

}
?>