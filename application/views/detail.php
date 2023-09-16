<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Blog | Detail</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/blog/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    <meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .fa-regular:hover {
            cursor: pointer;
            color: black;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() . 'assets/css/blog.css' ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-12 d-flex flex-row justify-content-between align-items-center">
                    <p class="blog-header-logo text-dark">Blog Application in Codeigniter by Numan</p>
                    <a class="btn btn-info btn-sm" href="<?= base_url() ?>">Back To Home</a>
                </div>
            </div>
        </header>
        <h2 class="text-dark mt-2 text-center">Blog Detail</h2>
        <hr>
        <div class="jumbotron p-4 p-md-5 text-dark rounded bg-light mt-3">
            <div class="col-md-12 px-0">
                <h1 class="display-4 font-italic"><?php
                                                    echo   $blog['title'];
                                                    ?></h1>
                <p class="lead my-3 col-12">
                    <?php
                    echo   $blog['description'];
                    ?>
                </p>

                <p class="mt-3 float-right">
                    Blog written by
                    <?php
                    echo   $blog['author'];
                    ?>
                </p>
            </div>
        </div>
        <div class="col-md-12 d-flex flex-row mb-5">
            <div class="col-md-6">
                <h2 class="mb-3">Post your comment here!</h2>
                <form class="text-danger" method="POST" action="<?php echo base_url() . 'blog/detail/' . $blog['blog_id'] ?>">
                    <div class="mb-2">
                        <label for="name" class="form-label text-dark">Name *</label>
                        <input type="text" placeholder="Enter your name..." name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        <p><?php echo form_error('name'); ?></p>
                    </div>
                    <div class="mb-1">
                        <div>
                            <label for="comment" class="form-label text-dark">Comments *</label>
                        </div>
                        <textarea class="col-sm-6 col-md-12" placeholder="Enter your comment..." name="comment" cols="70" rows="8"><?php echo set_value('comment'); ?></textarea>
                        <p><?php echo form_error('comment'); ?></p>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        <!-- <a href="" class="btn btn-dark">Cancel</a> -->
                    </div>

                </form>
            </div>
            <div class="col-md-6 border">
                <h3 class="text-center">Comments Section</h3>
                <hr>
                <?php
                if (!empty($comments)) {
                    foreach ($comments as $comment) {
                ?>
                        <div class="col-md-12 px-0">
                            <div class="d-flex flex-row justify-content-between mt-2">
                                <p class="float-left text-justify col-10">
                                    <?php
                                    echo   $comment['comment'];
                                    ?>
                                </p>
                                <small class="float-right col-3">
                                    <?php
                                    $time = $comment['created_at'];
                                    $dofb = date("h:i A (d/M/y)", strtotime($time));
                                    echo $dofb;
                                    ?>
                                </small>
                            </div>

                            <strong class="font-italic">
                                By <?php
                                    echo   $comment['name'];
                                    ?></strong>


                        </div>
                        <hr>
                    <?php
                    }
                } else {
                    ?>
                    <p class="text-center">No Comments Yet</p>
                <?php
                }

                ?>
            </div>
        </div>

</body>

</html>