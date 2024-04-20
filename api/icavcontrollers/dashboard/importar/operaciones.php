<?php

function uploadFile($file, $target_file)
{
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        return $uploadOk;
    } else {
        if (move_uploaded_file($file, $target_file)) {
            /**
             * 1 = The file has been uploaded.
             * 0 = The file has not been uploaded.
             */
        } else {
            $uploadOk = 0;
            // echo "Sorry, there was an error uploading your file.";
        }
        return $uploadOk;
    }
}

function deleteFile($file)
{
    unlink($file);
}