<?php
     header('Content-Description: File Transfer');
        header('Content-Type: txt/html');            
        header('Content-Disposition: attachment; filename="results.txt"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Content-Length: ' . filesize("results.txt"));
        readfile("results.txt");
        exit;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
</html>
