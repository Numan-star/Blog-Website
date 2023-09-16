<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blog List</h1>
    </div>
    <?php
    $successMsg = $this->session->userdata('Success');
    ?>
    <?php
    if (!empty($successMsg)) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
            echo $successMsg;
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    if (!empty($blogs)) {
        $id = 1;
    ?>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Special</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($blogs as $val) {
                ?>
                    <tr>
                        <th scope="row">
                            <?php
                            echo $id++;
                            ?>
                        </th>
                        <td><?php
                            echo $val['title'];
                            ?></td>
                        <td class="text-justify">
                            <?php
                            echo $val['description'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $val['author'];
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($val['special'] == "featured") {
                                echo "featured";
                            } else if ($val['special'] == "promo") {
                                echo "Promotional";
                            } else {
                                echo "N/A";
                            }
                            ?>
                        </td>
                        <td>
                            <a class="" title="Edit" onclick="editBlog(<?php echo $val['blog_id']; ?>);"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a class="" title="Delete" onclick="deleteBlog(<?php echo $val['blog_id']; ?>);"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <div class="d-flex justify-content-between align-items-center">
                    <td>
                        No Records Found
                    </td>
                    <td>
                        <a class="btn btn-outline-info" href="<?php echo base_url() . 'blog/add'; ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Click here to Add Blog
                        </a>
                    </td>
                </div>
            <?php
            }
            ?>

            </tbody>
        </table>
        <hr>
</main>
<script>
    function deleteBlog(id) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = "<?php echo base_url() . 'blog/delete/' ?>" + id;
        }
    }

    function editBlog(id) {
        window.location.href = "<?php echo base_url() . 'blog/edit/' ?>" + id;
    }
</script>