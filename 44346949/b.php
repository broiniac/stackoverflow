<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>
<body>
    <form action="b.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file_img[]" multiple>
        <input type="submit" name="btn_upload" value="Upload">
    </form>

    <?php
    include_once 'koneksi.php';

    /**
     * @param mixed ...$vars
     */
    function dump(...$vars)
    {
        foreach ($vars as $var) {
            echo '<pre>';
            var_export($var);
            echo '</pre><hr>';
        }
    }

    if (isset($_POST['btn_upload'])) {
        $results = [];
        for ($i = 0; $i < count($_FILES['file_img']['name']); $i++) {
            $filetmp = $_FILES["file_img"]["tmp_name"][$i];
            $filename = $_FILES["file_img"]["name"][$i];
            $filetype = $_FILES["file_img"]["type"][$i];
            $filepath = "uploads/".$filename;

            move_uploaded_file($filetmp, $filepath);

            $sql = "INSERT INTO files (file, path, type) VALUES ('$filename','$filepath','$filetype')";
            // #NOTICE: Read about SQL Injection and why above SQL is bad.

            $results[$filepath] = $connect->query($sql);
        }

        $connect->close();

        if (!in_array(false, $results, true)) {
            header("Location: b.php");
            exit;  // #NOTICE: Always add `exit` after "header Location:"
        }

        // #NOTICE: This is perfect place for some error handling in case
        //     some of the files didn't upload properly
    }
    ?>
</body>
</html>
