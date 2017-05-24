
<?php
   // session_start();
    //$downloadFile = $_SESSION['downloadFile'];
?>

<!DOCTYPE html>
<!--
VIEW FOR RESULT
HTML snippet appears in main view
Author: Elizabeth Avery
Date:   05/03/2017
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conway's Game of Life</title>   
        <link href='universe.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>       
        <div id='result'>
            
            <p>The next state of your universe is ready. Click here to download it.</p> <br>
            
            <button type="submit" onclick="window.open('download.php')">Download</button>
            
        </div>
    </body>
</html>
