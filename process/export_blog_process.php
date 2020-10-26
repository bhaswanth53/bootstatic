<?php

    require "../vendor/autoload.php";
    require "../core/facades/file.php";

    use Jajo\JSONDB;

    $blog = $_POST['id'];

    $db = new JSONDB('../core/data');
    $blogdb = new JSONDB( '../core/blogs/' . $blog );

    $schema = $blogdb->select("*")->from("schema.json")->get();
    $schema = (array) $schema[0];

    $path = "../build/" . $blog;
    $bpath = "../core/blogs/" . $blog;

    $file = new File();
    $file->createFolder("../build");
    if($file->folderExists($path)) {
        echo "Folder Already Exists";
    } else {
        $file->createFolder($path);
        $file->copyFolder($bpath."/assets", $path."/assets");
        $file->copyFolder($bpath."/posts", $path."/posts");
        
        $home_path = "../core/templates/" . $schema['template'] . "/index.html";
        $chunk_path = "../core/templates/" . $schema['template'] . "/chunk.html";

        $homepage = $file->readFile($home_path);
        $chunk = $file->readFile($chunk_path);
    }

?>