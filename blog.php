<?php
    require "./vendor/autoload.php";
    use Jajo\JSONDB;
    $jsondb = new JSONDB( './core/data' );
    $blog = $_GET['blog'];
    $blogdb = new JSOnDB('./core/blogs/' . $blog);
    $page = "blogs";

    $schema = $blogdb->select("*")->from("schema.json")->get();
    $schema = (array) $schema[0];

    $posts = $blogdb->select("*")->from("posts.json")->get();
    $posts = (array) $posts;
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
                    <tr>
                        <td colspan="4">
                            <div class="uk-button-group">
                                <?php if(!is_dir("build/".$schema['name']) || !file_exists("build/".$schema['name'])) { ?>
                                    <form method="POST" action="./process/export_blog_process.php">
                                        <input type="hidden" name="id" value="<?php echo $schema['id']; ?>" />
                                        <button type="submit" class="uk-button uk-button-brown">Export</button>
                                    </form>
                                <?php } else { ?>
                                    <form method="POST" action="">
                                        <button type="submit" class="uk-button uk-button-brown">Update</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="uk-grid-match" uk-grid>
                <div class="uk-width-1-2">
                    <p class="title">Posts</p>
                </div>
                <div class="uk-width-1-2 uk-text-right">
                    <a href="<?php echo "add_post.php?blog=" . $blog; ?>"><button class="uk-button uk-button-small uk-button-brown">Add <i class="fa fa-plus ml-2"></i></button></a>
                </div>
            </div>
            <br/>
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
                        <?php
                            if(isset($posts) && count($posts) > 0) {
                                $iteration = 1;
                                foreach($posts as $post) {
                                    $post = (array) $post;
                                    $url = "./core/blogs/" . $blog . "/posts/" . $post['page'];
                        ?>
                                <tr>
                                    <td><?php echo $iteration; ?></td>
                                    <td><?php echo $post['title']; ?></td>
                                    <td>
                                        <divc class="uk-button-group">
                                            <a href="<?php echo $url; ?>" target="_blank" title="View Page"><button class="uk-button uk-button-small uk-margin-right uk-button-brown"><i class="fa fa-eye"></i></button></a>
                                            <form method="POST" action="">
                                                <input type="hidden" name="post" value="<?php echo $post['id']; ?>" />
                                                <button type="submit" class="uk-button uk-button-small uk-button-brown" title="ExportPost"><i class="fa fa-cloud-download"></i></button>
                                            </form>
                                        </divc>
                                    </td>
                                </tr>
                        <?php
                                    $iteration++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php include("./layouts/footer.php"); ?>