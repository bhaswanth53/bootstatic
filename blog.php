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
                        <li><?php echo $schema['name']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div>
                <table class="uk-table">
                    <tr>
                        <th>Blog Name</th>
                        <td><?php echo $schema['name']; ?></td>
                        <th>Title</th>
                        <td><?php echo $schema['title']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="label-title">Description</p>
                            <?php echo $schema['description']; ?>
                        </td>
                        <td colspan="2">
                            <p class="label-title">Keywords</p>
                            <?php echo $schema['keywords']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">Template</th>
                        <td colspan="2"><?php echo $schema['template']; ?></td>
                    </tr>
                </table>
            </div>
            <h4>Posts</h4>
            <div class="uk-overflow-auto">
                <table class="datatable uk-table">
                    <thead>
                        <tr>
                            <td>S.No</td>
                            <td>Post Title</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>