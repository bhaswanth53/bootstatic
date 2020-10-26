<?php
    require "../vendor/autoload.php";
    require "../core/facades/Post.php";

    use Jajo\JSONDB;

    $blog = $_POST['blog'];
    $template = $_POST['template'];
    $meta_title = $_POST['mtitle'];
    $meta_description = $_POST['mdescription'];
    $meta_keywords = $_POST['mkeywords'];
    $post_title = $_POST['ptitle'];
    $url = $_POST['purl'];
    $content = $_POST['content'];
    $chunk = $_POST['chunk'];

    $blogdb = new JSONDB( '../core/blogs/' . $blog );

    $post = new Post($template, $blog);
    $post->fetchPage();
    $post->fetchMetaTitle($meta_title);
    $post->fetchMetaDescription($meta_description);
    $post->fetchMetaKeywords($meta_keywords);
    $image = $post->fetchPostImage($_FILES['image']);
    $post->fetchPostTitle($post_title);
    $post->fetchPostContent($content);
    $post->fetchDate();
    $page = $post->createPage($url);

    $id = $blog . "-" . date('dmYhis');

    $blogdb->insert("posts.json", [
        "id" => $id,
        "title" => $post_title,
        "image" => $image,
        "page" => $page,
        "chunk" => $chunk,
        "date" => date('d-m-Y h:i:s')
    ]);

    header("Location: ../blogs.php?success=true");
?>