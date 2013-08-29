<?php
 $new_image_name = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], WWW_ROOT . "/img/" . $new_image_name);
?>