<?php
    require "../vendor/autoload.php";
    require "../core/facades/file.php";

    use Jajo\JSONDB;

    if(isset($_POST['submit'])) {
        $template = $_POST['template'];
        $title = $_POST['title'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $keywords = $_POST['keywords'];
        $bloghead = $_POST['bloghead'];
        $blogfoot = $_POST['blogfoot'];
        $date = date('d/m/Y h:i:s');
        $id = "BS" . date('ymdhis');

        $jsondb = new JSONDB( '../core/data' );
        $blogdb = new JSONDB( '../core/blogs/' . $id );
        $file = new File();

        $file->createFolder("../core/blogs/" . $id);
        $file->copyFolder("../core/templates/" . $template . "/assets", "../core/blogs/" . $id . '/assets');

        if(isset($bloghead) && !empty($bloghead))
        {
            $headfile = "../core/blogs/" . $name . "/head.txt";
            $file->createFile($headfile);
            $file->writeFile($headfile, $bloghead);
        }

        if(isset($blogfoot) && !empty($blogfoot))
        {
            $footfile = "../core/blogs/" . $name . "/foot.txt";
            $file->createFile($footfile);
            $file->writeFile($footfile, $blogfoot);
        }

        $schema = array(
            "id" => $id,
            "name" => $name,
            "title" => $title,
            "description" => $description,
            "keywords" => $keywords,
            "template" => $template,
            "created" => $date
        );

        $blog = array(
            "id" => $id,
            "name" => $name,
            "template" => $template,
            "created" => $date
        );

        $blogdb->insert("schema.json", $schema);
        $jsondb->insert("blogs.json", $blog);

        header("Location: ../blogs.php?success=true");
    }
?>