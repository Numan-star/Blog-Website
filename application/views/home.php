<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Nomi | Blog</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/blog/">



        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


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
            /* color: black; */
        }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() . 'assets/css/blog.css' ?>" rel="stylesheet">

    </head>

    <body>

        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-12 text-center">
                        <a class="blog-header-logo text-dark" href="#">Blog Application in Codeigniter by Numan</a>
                    </div>
                </div>
            </header>

            <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark mt-3">
                <div class="col-md-12 px-0">
                    <h1 class="display-4 font-italic"><?php
echo $promoBlog['title'];
?></h1>
                    <p class="lead my-3 col-12">
                        <?php
echo word_limiter($promoBlog['description'], 38);
?>
                    </p>
                    <p class="lead mb-0"><a href="<?=base_url() . 'blog/detail/' . $promoBlog['blog_id'];?>"
                            class="text-white font-weight-bold">Continue reading...</a></p>
                    <p class="mt-3 float-right">
                        Blog written by
                        <?php
echo $promoBlog['author'];
?>
                    </p>
                </div>
            </div>

            <div class="row mb-2">
                <?php
foreach ($featuredBlogs as $featured) {
    ?>
                <div class="col-md-6">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0"><?php
echo $featured['title'];
    ?></h3>
                            <div class="mb-1 text-muted"><?php
echo $featured['created_at'];
    ?></div>
                            <p class="card-text mb-auto">
                                <?php
echo word_limiter($featured['description'], 30);
    ?>
                            </p>
                            <a href="<?=base_url() . 'blog/detail/' . $featured['blog_id'];?>"
                                class="stretched-link">Continue reading</a>
                        </div>
                    </div>
                </div>
                <?php
}
?>
            </div>

        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-12 blog-main">
                    <h3 class="pb-4 mb-4 font-italic border-bottom">
                        Our Blog's
                    </h3>
                    <?php
foreach ($allBlogs as $blogs) {
    ?>
                    <div class="blog-post">
                        <h2 class="blog-post-title">
                            <?=
        $blogs['title'];
    ?>
                        </h2>
                        <p class="blog-post-meta"><?=
        $blogs['created_at'];
    ?> <a class="ml-1" title="Set as Favorite"><i
                                    onclick="favoriteBlog()" class="fa-regular fa-heart" id="iconID"></i></a></p>

                        <p><?=$blogs['description'];?></p>
                        <p>By <?=$blogs['author'];?></p>
                    </div><!-- /.blog-post -->
                    <hr>

                    <?php
}
?>
                </div><!-- /.blog-main -->

            </div><!-- /.row -->
            <!-- <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled">Newer</a>
        </nav> -->
        </main><!-- /.container -->

        <footer class="blog-footer">
            <p>Blog template created by Numan</p>
            <p>
                <a href="#">Back to top</a>
            </p>
        </footer>


        <script>
        function favoriteBlog() {
            console.log("Numan");
        }
        </script>
    </body>

</html>