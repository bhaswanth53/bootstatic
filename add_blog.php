<?php
    require "./vendor/autoload.php";
    use Jajo\JSONDB;
    $jsondb = new JSONDB( './core/data' );
    $page = "blogs";
    $templates = $jsondb->select("*")->from("templates.json")->get();
?>

<?php include("./layouts/header.php"); ?>

    <section class="uk-padding-small breadcrumb">
        <div uk-grid>
            <div class="uk-width-1-2@m">
                <h4>Add Template</h4>
            </div>
            <div class="uk-width-1-2@m mt-none">
                <div class="uk-align-right@m">
                    <ul class="uk-breadcrumb">
                        <li><a href="">Home</a></li>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Templates</a></li>
                        <li><a href="">Add</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            <form action="./process/add_blog_process.php" class="formlay" method="POST">
                <div class="uk-margin">
                    <label class="uk-form-label" for="template">Select Template<span class="text-danger">*</span></label>
                    <select class="uk-select" name="template" required>
                        <?php
                            if(isset($templates) && count($templates) > 0)
                            {
                                foreach($templates as $item)
                                {
                                    $item = (array) $item;
                        ?>
                                    <option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="name">Blog Name<span class="text-danger">*</span></label>
                    <input type="text" class="uk-input" name="name" required />
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="title">Blog Title<span class="text-danger">*</span></label>
                    <input type="text" class="uk-input" name="title" required />
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="description">Blog Description<span class="text-danger">*</span></label>
                    <textarea class="uk-textarea" rows="4" name="description" required></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="keywords">Blog Keywords(seperate with ",")<span class="text-danger">*</span></label>
                    <textarea class="uk-textarea" rows="4" rows="4" name="keywords" required></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="bloghead">Blog Head</label>
                    <textarea class="uk-textarea" rows="4" name="bloghead" rows="5"></textarea>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="blogfoot">Blog Foot</label>
                    <textarea class="uk-textarea" rows="4" name="blogfoot" rows="5"></textarea>
                </div>
                <div class="uk-margin">
                    <button type="submit" name="submit" class="uk-button uk-button-brown">Create Blog</button>
                </div>
            </form>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>