<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/**
   * Returns the JSON encoded POST data, if any, as an object.
   * 
   * @return Object|null
   */
 function retrieveJsonPostData()
  {
    // get the raw POST data
    $rawData = file_get_contents("php://input");

    // this returns null if not valid json
    return json_decode($rawData);
  }

if ( isset( $_POST[ 'submit' ] ) ) {
    $file = $_FILES[ 'file' ];

//      var_dump($file['name']); exit();

    $maxFileSize = 1000000 * 500; // 500 mb

    $fileName = $file['name'];
    $fileTmpName = $file[ 'tmp_name' ];
    $fileSize = $file[ 'size' ];
    $fileError = $file[ 'error' ];
    $fileType = $file[ 'type' ];

    $fileExt = explode( '.', $fileName );
    $FileActualExt = strtolower( end( $fileExt ) );
    $allowed = array( 'jpg', 'jpeg', 'png', 'pdf' );

   $allowedMimeTypes = ['image/png', 'image/jpeg', 'application/pdf'];
   $finfo = finfo_open(FILEINFO_MIME_TYPE);
   finfo_close($finfo);

   if(!in_array(finfo_file($finfo, $file['tmp_name']), $allowedMimeTypes)) {
     echo 'Unrecognized file type';
     exit();
   }


    $moveFileDir = 'uploads/';
    $moveFileName = uniqid( '', true ).'.' . basename($file['name']);
    $moveFileFullPath = $moveFileDir . $moveFileName;
    if  ( in_array( $FileActualExt, $allowed ) ) {
        if  ( $fileError === 0 ) {
            if ( $fileSize <= $maxFileSize )  {
                move_uploaded_file($file['tmp_name'], $moveFileFullPath);
                header("Location: index.php?uploadsuccess&fn=". $moveFileName);
            }else    {
                     echo 'Your file is too big.';
            }
        }else  {
                echo 'There was an error uploading  your file.';
        }
    }else  {
            echo 'File type not permitted.';
    }
}