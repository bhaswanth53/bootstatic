<?php
    require "./vendor/autoload.php";
    use Jajo\JSONDB;
    $jsondb = new JSONDB( './core/data' );
    $page = "templates";

    $templates = $jsondb->select("*")->from("templates.json")->get();
?>

<?php include("./layouts/header.php"); ?>

    <section class="uk-padding-small breadcrumb">
        <div uk-grid>
            <div class="uk-width-1-2@m">
                <h4>Templates</h4>
            </div>
            <div class="uk-width-1-2@m mt-none">
                <div class="uk-align-right@m">
                    <ul class="uk-breadcrumb">
                        <li><a href="">Home</a></li>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Templates</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            <!-- Templates -->
            <?php if(isset($templates) && count($templates) > 0) { ?>
                <div class="uk-grid-match" uk-grid>
                    <div class="uk-width-1-1 uk-text-right">
                        <a href="add_template.php"><button class="uk-button uk-button-small uk-button-brown">Add New <i class="fa fa-plus ml-2"></i></button></a>
                    </div>
                </div>
                <?php if(isset($templates) && count($templates) > 0) { ?>
                    <div class="uk-grid-match" uk-grid>
                    <?php
                        foreach($templates as $item) {
                        $item = (array) $item;
                    ?>
                        <div class="uk-width-1-2@m uk-width-1-4@m">
                            <div class="uk-card tcard">
                                <img class="card-img-top timage" src="./assets/images/template.jpg" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title tname"><?php echo $item['name']; ?></h4>
                                    <a href="./<?php echo $item['folder']; ?>/demo" target="_blank" class="uk-button uk-button-small button">Preview</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            <!-- End of templates -->
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>