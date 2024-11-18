<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .item {
            width: 200px;
            height: 200px;
            overflow: hidden;
        }

        .itemImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1 class="header">檔案管理練習</h1>
    <!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
    <?php
        include "function.php";
        if(isset($_FILES['img']))
        {
            if($_FILES['img']['error'] == 0)
            {//成功
                $tmp_name = $_FILES['img']['tmp_name'];
                $tmp_fileName = $_FILES['img']['name'];
                move_uploaded_file($tmp_name, "./files/".$tmp_fileName);
            }else
            {
                echo "上傳失敗,請檢察檔案格式是否符合格式";
            }
        }
    ?>
    <!----透過檔案讀取來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->
    <?php
        $dirpath = "./files";
        $itmes = scandir($dirpath);
        $itmes = array_diff($itmes, array('.', '..'));
        foreach($itmes as $file)
        {
            $isPath = $dirpath.DIRECTORY_SEPARATOR.$file;
            if(!is_dir($isPath))
            {
                echo "<div class='item'>";
                echo "<img class='itemImage' src='$dirpath/{$file}'>";
                echo "</div>";
                echo "<a href='del_img.php?file={$file}'>&nbsp刪除&nbsp</a>";
                echo "<a href='re_upload.php?file={$file}'>&nbsp重新上傳&nbsp</a>";
            }else
            {
            }
        }
    ?>
    <!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->




</body>

</html>