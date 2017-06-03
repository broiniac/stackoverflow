ID:     44346949
Title:  PHP and MySQLi - Upload Multiple Image
Link:   https://stackoverflow.com/questions/44346949/php-and-mysqli-upload-multiple-image

Question:

I am planning to make an image galary using PHP with MySQL as a database.

I already make a multiple upload images using PHP but I got a problem. When I uploaded **8 images** in database only show 1 row data. But in folder there are **8 images** that I have upload.

Here is my code :

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    </head>

    <body>

    <form action="a.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file_img[]" multiple>
    <input type="submit" name="btn_upload" value="Upload">    
    </form>

    <?php
    include_once 'koneksi.php';
    if(isset($_POST['btn_upload']))
    {
        for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
        {
            $filetmp = $_FILES["file_img"]["tmp_name"][$i];
            $filename = $_FILES["file_img"]["name"][$i];
            $filetype = $_FILES["file_img"]["type"][$i];
            $filepath = "uploads/".$filename;

        move_uploaded_file($filetmp,$filepath);

        $sql = "INSERT INTO files (file,path,type) VALUES ('$filename','$filepath','$filetype')";
        if($connect->query($sql) === TRUE) {        
    header("Location: a.php");    
    } else {        
    header("Location: a.php");    
    }     
    	}

        $connect->close();}
    ?>

    </body>
    </html>

Can someone help me ? Thanks for ur feedback :)
