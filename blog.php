<?php
    require "./vendor/autoload.php";
    use Jajo\JSONDB;
    $jsondb = new JSONDB( './core/data' );
    $blog = $_GET['blog'];
    $blogdb = new JSOnDB('./core/blogs/' . $blog);
    $page = "blogs";

    $schema = $blogdb->select("*")->from("schema.json")->get();
    $schema = (array) $schema[0];
?>

<?php include("./layouts/header.php"); ?>

    <section class="uk-padding-small breadcrumb">
        <div uk-grid>
            <div class="uk-width-1-2@m">
                <h4><?php echo $schema['name']; ?>(<?php echo $schema['id']; ?>)</h4>
            </div>
            <div class="uk-width-1-2@m mt-none">
                <div class="uk-align-right@m">
                    <ul class="uk-breadcrumb">
                        <li><a href="">Home</a></li>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>