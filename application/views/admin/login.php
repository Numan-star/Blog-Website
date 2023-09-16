<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <title>Login | Page</title>
        <style>
        .big {
            font-size: 100px;
            font-style: oblique;
            text-shadow: 3px 3px 3px gray;
        }
        </style>
    </head>

    <body>
        <p class="big text-center">Blog Website in Codeigniter</p>

        <div class="d-flex align-items-center mt-5 justify-content-center flex-column col-12">
            <h2 class="my-5">Please Sign In</h2>
            <?php
$errorMsg = $this->session->userdata('errorMsg');
?>
            <?php
if (!empty($errorMsg)) {
    ?>
            <div class="alert alert-danger" role="alert">
                <?php
echo $errorMsg;
    ?>
            </div>
            <?php
}
?>
            <form class="col-3" action="<?php echo base_url() . 'login/index'; ?>" method="post">
                <div class="form-group">
                    <label for="email">User Name</label>
                    <input type="text" name="username" placeholder="Enter email..." class="form-control"
                        value="<?php echo set_value('username'); ?>">
                    <p><?php echo form_error('username'); ?></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter password..." name="password" class="form-control"
                        value="<?php echo set_value('password'); ?>">
                    <p><?php echo form_error('password'); ?></p>
                </div>
                <button type="submit" class="btn btn-primary col-md-12">Submit</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>

    </body>

</html>