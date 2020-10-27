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
            <form method="POST" action="./process/add_post_process.php" class="uk-margin-top formlay" enctype="multipart/form-data">
                <input type="hidden" name="blog" value="<?php echo $schema['id']; ?>" />
                <input type="hidden" name="template" value="<?php echo $schema['template']; ?>" />
                <div uk-grid>
                    <div class="uk-width-2-3@m">
                        <div class="uk-margin">
                            <label class="uk-form-label">Title<span class="text-danger">*</span></label>
                            <input type="text" class="uk-input" name="ptitle" required />
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">URL<span class="text-danger">*</span></label>
                            <input type="text" class="uk-input" name="purl" required />
                            <span class="note">*Words seperated by "-".</span><br/>
                            <span class="note">*URL must be unique in the blog.</span>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Short Description<span class="text-danger">*</span></label>
                            <textarea class="uk-textarea no-resize" name="chunk" rows="3" required></textarea>
                            <span class="note">*Max 500 characters allowed.</span>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Post Content<span class="text-danger">*</span></label>
                            <textarea class="editor uk-textarea" name="content" required></textarea>
                        </div>
                    </div>
                    <div class="uk-width-1-3@m">
                        <p class="ptitle">Meta Data</p>
                        <div class="uk-margin">
                            <label class="uk-form-label">Page Title<span class="text-danger">*</span></label>
                            <input type="text" class="uk-input" name="mtitle" required />
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Page Description<span class="text-danger">*</span></label>
                            <textarea class="uk-textarea no-resize" rows="4" name="mdescription" required></textarea>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Keywords<span class="text-danger">*</span></label>
                            <textarea class="uk-textarea no-resize" rows="3" name="mkeywords" required></textarea>
                            <span class="note">* Please seperate keywords with (,) commas.</span>
                        </div>
                        <p class="ptitle">Featured Image<span class="text-danger">*</span></p>
                        <div class="uk-margin">
                            <input type="file" class="uk-input" name="image" id="featureImage" required />
                            <img class="uk-margin-top uk-width-1-1" src="./assets/images/back.jpg" id="preview-featured" style="display: none;" />
                        </div>
                        <button type="submit" name="submmit" class="uk-button uk-button-brown" value="submit">Create Post</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>