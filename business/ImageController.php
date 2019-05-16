<?php

class ImageController
{
    public function uploadImage($type){
        if(isset($_FILES["imgfile"]) && $_FILES["imgfile"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES["imgfile"]["name"];
            $filetype = $_FILES["imgfile"]["type"];
            $filesize = $_FILES["imgfile"]["size"];

            $extension = $this->verifyExtensions($filename, $allowed);
            $size = $this->verifyFileSize($filesize);

            if(in_array($filetype, $allowed) && $extension && $size){
                if ($type == "product"){
                    if(file_exists("../../includes/images/product-img/" . $filename)){
                        echo $filename . " already exists.";
                    } else{
                        move_uploaded_file($_FILES["imgfile"]["tmp_name"], "../../includes/images/product-img/" . $filename);
                        echo "Your file was uploaded successfully.";
                        return "includes/images/product-img/" . $filename;
                    }
                }else{
                    if(file_exists("../../includes/images/" . $filename)){
                        echo $filename . " already exists.";
                    } else{
                        move_uploaded_file($_FILES["imgfile"]["tmp_name"], "../../includes/images/" . $filename);
                        echo "Your file was uploaded successfully.";
                        return "includes/images/" . $filename;
                    }
                }
            } else{
                echo "Error: There was a problem uploading your file. Please try again.";
                return null;
            }
        } else{
            echo "Error: " . $_FILES["imgfile"]["error"];
            return null;
        }
    }

    public function verifyExtensions($filename, $allowed){
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(array_key_exists($ext, $allowed)){
            return true;
        }else{
            echo "Error: Please select a valid file format.";
            return null;
        }
    }

    public function verifyFileSize($filesize){
        $maxsize = 5 * 1024 * 1024;
        if($filesize < $maxsize) {
            return true;
        }else{
            echo "Error: File size is larger than the allowed limit.";
            return null;
        }
    }
}

