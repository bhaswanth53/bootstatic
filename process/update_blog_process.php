<?php

    require "../vendor/autoload.php";
    require "../core/facades/file.php";
    require "../core/facades/blog.php";

    use Jajo\JSONDB;

    $blog = $_POST['id'];

    $db = new JSONDB('../core/data');
    $blogdb = new JSONDB( '../core/blogs/' . $blog );

    $schema = $blogdb->select("*")->from("schema.json")->get();
    $schema = (array) $schema[0];

    $posts = $blogdb->select("*")->from("posts.json")->get();

    $path = "../build/" . $blog;
    $bpath = "../core/blogs/" . $blog;

    $file = new File();
    $file->createFolder("../build");
    if($file->folderExists($path)) {
        $file->deleteFolder($path);
    }
    $file->createFolder($path);
    $file->copyFolder($bpath."/assets", $path."/assets");
    $file->copyFolder($bpath."/posts", $path."/posts");
    
    $home_path = "../core/templates/" . $schema['template'] . "/index.html";
    $chunk_path = "../core/templates/" . $schema['template'] . "/chunk.html";
    $head_path = "../core/blogd/" . $blog . "/head.txt";
    $foot_path = "../core/blogd/" . $blog . "/foot.txt";
    $head = "";
    $foot = "";

    if($file->fileExists($head_path)) {
        $head = $file->readFile($head_path);
    }

    if($file->fileExists($foot_path)) {
        $foot = $file->readFile($foot_path);
    }

    $homepage = $file->readFile($home_path);
    $chunk = $file->readFile($chunk_path);

    $blg = new Blog($schema['template'], $homepage, $chunk);
    $blg->fetchData($schema, $posts);
    $blg->fetchHeaderandFooter($head, $foot);
    $blg->fetchListing();
    $index = $blg->getIndexPage();

    $hpath = "../build/" . $blog . "/index.html";
    $file->createFile($hpath);
    $file->writeFile($hpath, $index);

    header('Location: ../blog.php?blog=' . $blog . "&success=true");

?>