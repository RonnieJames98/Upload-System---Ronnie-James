<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload System Project</title>
    </head>
    <body>
        <?php
        
        ?>
        <!-- Links the form action to upload.php. Uses the post method to store this data on the server. -->
        <form action = "upload.php" method="post" enctype="multipart/form-data">
            <input type = "file" name ="file">
            <button type = "submit" name="submit">SUBMIT</button>
        </form>
    </body>
</html>