<?php
    if(isset($_POST['submit'])){
        $file = $_FILES['file']; // Sets variable $file == uploaded file
        $name = $_FILES['file']['name']; // Find the name of the uploaded file
        $tmp_name = $_FILES['file']['tmp_name']; // Find the location of the file
        $size = $_FILES['file']['size']; // Find the size of the file
        $error = $_FILES['file']['error']; // Return Errors

        $tempExtension = explode('.', $name); // Splits a string into array using the first variable

        $fileExtension = strtolower(end($tempExtension)); // formatting to lower (PHP is case sensitive)

        // Extensions accepted
        $isAllowed = array('jpg', 'jpeg','png','pdf');

        if (in_array($fileExtension, $isAllowed)){
            if ($error === 0){ // 0 means no errors, 1 means errors
                if ($size < 300000){ // PHP works with KB. 
                    $newFileName = uniqid('', true) . "." . $fileExtension; // Stops files with the same name from overwriting each other
                    $fileDestination = "Upload Destination/${newFileName}";
                    move_uploaded_file($tmp_name, $fileDestination); // Moves the location of the file from the temp location to the designated location
                    header("Location: index.php?uploadedsuccess");
                }
                else{
                    echo "Your file size is too large. Upload a smaller image.";
                }
            } else{
                echo "An error has occured. Try again.";
            }
        } 
        else{
            echo "Sorry your file type is not accepted.";
        }
    }

?>