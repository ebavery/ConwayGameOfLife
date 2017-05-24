<?php
/*
 * CONTROLLER--RUN PROGRAM FROM THIS FILE
 */

/** *
 * universe.php collects the file from the user and sends it to the models for processing
 * 
 * VIEW is below
 *
 * Author:  Elizabeth Avery
 * Date:    05/02/2017
 */
require_once('UniverseDataModel.php');
require_once('UniverseFileModel.php');

$message = "";

if (array_key_exists('initialFile', $_FILES)){
    $tmp_name = $_FILES['initialFile']['tmp_name'];
    $path = getcwd();
    $name = $path . DIRECTORY_SEPARATOR . $_FILES['initialFile']['name'];   
    $success = move_uploaded_file($tmp_name, $name);
   
    if ($success){
        $initialArray = file($name, true);

        $universe = new UniverseDataModel($initialArray);

        $resultArray = $universe->returnNextState();

        $resultFile = UniverseFileModel::writeFile($resultArray);
        
        $path = getcwd();
        $downloadFile = $path . DIRECTORY_SEPARATOR . $resultFile;        
             
        if (file_exists($downloadFile)){
            unlink($name);
            include('nextStateReadySnippet.php');           
        }    
    }
    
    else {
        $message = 'An error has occurred. Please try again.';
    }
}

?>
<!DOCTYPE html>
<!--
VIEW
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conway's Game of Life</title>
        <link href='universe.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <div id='upload'>
            <form action="universe.php" method="post" enctype="multipart/form-data">
                <h2>Conway's Game of Life</h2>
                <p>Please upload a *.txt file with the current state of your universe.</p>
                <input type="file" name='initialFile'><br>
                <input type="submit" value="Upload"><br>
                <p id="message">
                    <?php echo $message;  ?>
                </p>
            </form>
        </div>
        
    </body>
</html>
