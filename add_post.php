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
            <div class="uk-width-1-3@m">
                <h4>Add Post</h4>
            </div>
            <div class="uk-width-2-3@m mt-none">
                <div class="uk-align-right@m">
                    <ul class="uk-breadcrumb">
                        <li><a href="">Home</a></li>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Blogs</a></li>
                        <li><a href=""><?php echo $schema['name']; ?></a></li>
                        <li>Add Post</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            <form method="POST" action="" class="uk-margin-top">
                <div uk-grid>
                    <div class="uk-width-2-3@m">
                        <div class="uk-margin">
                            <label class="uk-form-label">Title</label>
                            <input type="text" class="uk-input" name="ptitle" />
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">URL</label>
                            <input type="text" class="uk-input" name="purl" />
                            <span class="note">*Words seperated by "-".</span><br/>
                            <span class="note">*URL must be unique in the blog.</span>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Post Content</label>
                            <textarea class="editor uk-textarea" name="content"></textarea>
                        </div>
                    </div>
                    <div class="uk-width-1-3@m">
                        <p class="ptitle">Meta Data</p>
                        <div class="uk-margin">
                            <label class="uk-form-label">Page Title</label>
                            <input type="text" class="uk-input" name="mtitle" />
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Page Description</label>
                            <textarea class="uk-textarea no-resize" rows="4" name="mdescription"></textarea>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Keywords</label>
                            <textarea class="uk-textarea no-resize" rows="3" name="mkeywords"></textarea>
                        </div>
                        <p class="ptitle">Featured Image</p>
                        <div class="uk-margin">
                            <input type="file" class="uk-input" name="image" />
                        </div>
                        <button type="submit" class="uk-button uk-button-brown">Create Post</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>