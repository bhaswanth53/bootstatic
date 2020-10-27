<?php
    $page = "templates";
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
            <form action="./process/upload_template.php" class="formlay" method="POST" enctype="multipart/form-data">
                <div class="uk-width-1-2@m">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="name">Template Name<span class="text-danger">*</span></label>
                        <input type="text" class="uk-input" name="name" required />
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="file">Template File(Zip)<span class="text-danger">*</span></label>
                        <input type="file" class="uk-input" name="file" required />
                    </div>
                    <div class="uk-margin">
                        <button type="submit" name="submit" class="uk-button uk-button-brown">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>