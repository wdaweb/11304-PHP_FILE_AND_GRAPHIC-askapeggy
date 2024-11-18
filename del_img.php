<?php
    $imgName = $_GET['file'];

    if(isset($imgName))
    {
        unlink("./files/$imgName");
        header("Location:manage.php");
    }
?>