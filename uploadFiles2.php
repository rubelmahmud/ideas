<?php
/**
 * Created by PhpStorm.
 * User: Rubel
 * Date: 3/29/2018
 * Time: 1:17 AM
 */

define('SITE_ROOT', dirname(__FILE__));

If ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fileToZip = array();
        foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
                $name = basename($_FILES['file']['name'][$key]);
                $uploads_dir = SITE_ROOT . '/uploads/' . $name;
                array_push($fileToZip, $name);
                move_uploaded_file($_FILES['file']['tmp_name'][$key], "$uploads_dir");
        }

        $zip = new ZipArchive;
        $zip_name = time() . '.zip';
        if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE) {
                foreach ($fileToZip as $file) {
                        $zip->addFile('uploads/' . $file, $file);
                }
                $zip->close();
                // download
                header('content-type:application/octet-stream');
                header("content-disposition: attachment; filename=$zip_name");
                readfile($zip_name);
        }

}


?>