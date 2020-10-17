<?php
    require "./vendor/autoload.php";
    use Jajo\JSONDB;
    $jsondb = new JSONDB( './core/data' );
    $page = "blogs";

    $blogs = $jsondb->select("*")->from("blogs.json")->get();
?>

<?php include("./layouts/header.php"); ?>

    <section class="uk-padding-small breadcrumb">
        <div uk-grid>
            <div class="uk-width-1-2@m">
                <h4>Blogs</h4>
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
            <div class="uk-grid-match" uk-grid>
                <div class="uk-width-1-1 uk-text-right">
                    <a href="add_blog.php"><button class="uk-button uk-button-small uk-button-brown">Add New <i class="fa fa-plus ml-2"></i></button></a>
                </div>
            </div>
            <?php if(isset($blogs) && count($blogs) > 0) { ?>
                <?php if(isset($blogs) && count($blogs) > 0) { ?>
                    <div class="uk-grid-match" uk-grid>
                    <?php
                        foreach($blogs as $item) {
                        $item = (array) $item;
                    ?>
                        <div class="uk-width-1-2@m uk-width-1-4@m">
                            <div class="uk-card tcard">
                                <img class="card-img-top timage" src="./assets/images/blog.jpg" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title tname"><?php echo $item['name']; ?></h4>
                                    <a href="blog.php?blog=<?php echo $item['id']; ?>" class="uk-button uk-button-small button">Preview</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>