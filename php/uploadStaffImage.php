<?php 
    require("../database/database_interface.php"); //Connect to database and gather interface functions.
    $route = $_SERVER['HTTP_REFERER'];
    $staffUsernameToUploadTo = filter_input(INPUT_POST,'staffUsername',FILTER_SANITIZE_SPECIAL_CHARS); //Gets The User image is being uploaded for 
    $statusMsg ="";
    
    if(isset($_POST['imageUpload'])){ 
        $name = $_FILES['file']['name'];
        $target_dir = "../uploadedImages/staffImages/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","JPG","PNG");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            $images = GetAllStaffImages($PDO);
            foreach ($images as $image)
            {
                if ($image['staffUsername'] == $staffUsernameToUploadTo)
                    DeleteImageFromStaffImages($PDO, $staffUsernameToUploadTo);
            }

            // Upload file
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
                // Insert record
                $insert = UploadStaffImage($PDO, $name, $staffUsernameToUploadTo);
                if($insert){ 
                    $status = 'success'; 
                    $statusMsg = "File uploaded successfully.";
                    header('Location: '.$route);

                }else 
                    $statusMsg = "File upload failed, please try again.";
                    
            }
        }
        else
        {
            $statusMsg = 'Sorry, only jpg are allowed to upload (case Sensative)'; 
            header('Location: '.$route);
        }
        
    }
    echo $statusMsg;
?>