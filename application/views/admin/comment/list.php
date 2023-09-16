<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Comment List</h1>
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
    if (!empty($comments)) {
        $id = 1;
    ?>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($comments as $val) {
                ?>
                    <tr>
                        <th scope="row">
                            <?php
                            echo $id++;
                            ?>
                        </th>
                        <td class="text-justify"><?php
                                                    echo $val['comment'];
                                                    ?></td>
                        <td>
                            <?php
                            echo $val['name'];
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($val['status'] == "Active") {
                                echo "Active";
                            } else if ($val['status'] == "Block") {
                                echo "Block";
                            }
                            ?>
                        </td>
                        <td>
                            <a class="" title="Edit" onclick="editcomment(<?php echo $val['comment_id']; ?>);"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a class="" title="Delete" onclick="deletecomment(<?php echo $val['comment_id']; ?>);"><i class="fa-regular fa-trash-can"></i></a>
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
                    <!-- <td>
                        <a class="btn btn-outline-info" href="<?php
                                                                // echo base_url() . 'comment/add';
                                                                ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Click here to Add comment
                        </a>
                    </td> -->
                </div>
            <?php
            }
            ?>

            </tbody>
        </table>
        <hr>
</main>
<script>
    function deletecomment(id) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = "<?php echo base_url() . 'blog/deleteComment/' ?>" + id;
        }
    }

    function editcomment(id) {
        window.location.href = "<?php echo base_url() . 'blog/editComment/' ?>" + id;
    }
</script>