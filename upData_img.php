<?php
    include "function.php";
    $imgName=$_POST['imgName'];
    echo "<br>";
    echo $imgName;
    echo "<br>";
    if(!isset($_FILES['image']))
    {
        //echo $_POST['name'];
        //echo '<br>';
        //dd($_FILES);
        if($_FILES['img']['error'] == 0)
        {//成功
            $tmp_name = $_FILES['img']['tmp_name'];
            //$tmp_fileName = $_FILES['img']['name'];
            $tmp_fileName = "./files/".$imgName;
            echo $tmp_fileName;
            move_uploaded_file($tmp_name, $tmp_fileName);
        }else
        {
            echo "上傳失敗,請檢察檔案格式是否符合格式";
        }
        header("Location:manage.php");
    }
?>