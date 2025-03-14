<?php

if ($_SERVER['REQUEST_METHOD']=="POST"){
    // check if files was without error 
    if (isset($_FILES["uploaded_file"])&&$_FILES["uploaded_file"]["error"]===0) {
        // getfiles detalis 
        $file_name =$_FILES["uploaded_file"]["name"];
        $file_type =$_FILES["uploaded_file"]["type"];
        $file_size =$_FILES["uploaded_file"]["size"];
        $file_tmp_name =$_FILES["uploaded_file"]["tmp_name"];

        // security checks
        // 1. check files size (limit to 1MB in example)
        if ($file_size>1048576){
            echo "Error:files size exceed the limit(1MB)";
            exit; 
        }
    

    // valiidate file type/extenstion
    $allowed_types=["image/jpeg","image/png","image/gif","application/pdf"];
    if (!in_array($file_type,$allowed_types)){
        echo "error:only JPG,PNG,GIF, and PDF files are allowed ";
        exit;
    }


// 3.create a safe filename
$upload_dir = "uploads/";// make sure this directory exitst an is writable 
$new_file_name = uniqid()."_". basename ($file_name);
$upolad_path= $upload_dir. $new_file_name;

// 4. move the uploaded file to the destination 
if (move_uploaded_file($file_tmp_name,$upolad_path)){
    echo"files uploaded successfully. save as :". $new_file_name;

    // optional record the upolad in database 
    // recordFileupload ($new_files_name,$file_type,$files_size)
}else{
    echo "Error: Failed to save the uploaded file";
}
} else {
    // handle error 
    $error_message = "";
    switch ($_FILES["uploaded_file"]["error"]) {
        case UPLOAD_ERR_INI_SIZE:
        $error_message= "the upoladed files exceeds the maximum allowed size";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $error_message= "the uploaded files exceeds the form's maximum allowed size";
            break;
        case UPLOAD_ERR_PARTIAL:
            $error_message= "the file only partially upoladed ";
            break;
        case UPLOAD_ERR_NO_FILE:
            $error_message= "no files was uploded";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $error_message= "missing temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $error_message= "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            $error_message= "A PHP extenions stopped the files upload ";
            break;
        default:
        $error_message= "Unknown upload error";
    }

    echo "Error".$error_message. "<br>";
}
}