<?php
    require "../vendor/autoload.php";
    require "../core/facades/file.php";

    use Jajo\JSONDB;

    if(isset($_POST['submit'])) {
        $jsondb = new JSONDB( '../core/data' );
        $file = new File();
        $zip = new ZipArchive();

        $name = $_POST['name'];

        $filename = $file->upload($_FILES['file'], "", date('ymdhsi'));
        $zipfile = "../core/templates/zip/" . $filename;
        if($zip->open($zipfile) === TRUE) {
            $zip->extractTo('../core/templates/' . $name);
            $zip->close();
            
            $jsondb->insert("templates.json", [
                "name" => $name,
                "folder" => "/core/templates/".$name,
                "zip" => $filename
            ]);

            header('Location: ../templates.php?success=true');
        }

    }
?>