<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gallery</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <link href="/public/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/">The Phone books</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Books</a></li>
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <li class="nav-item"><a class="nav-link" href="/user/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="/user/registration">Registration</a></li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/logout">
                                    <?= $_SESSION['user']['firstName']?> - Выход
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="masthead">
            <div class="container h-100">
                <div class="row text-white-75 font-weight-light mb-5">
	                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="container">
                        <div class="alert alert-danger">
                            <ul>
				                <?php foreach ($_SESSION['errors'] as $error) : ?>
                                    <li><?=$error?></li>
				                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
		            <?php unset($_SESSION['errors']); ?>
	                <?php endif; ?>
	                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="container">
                        <div class="alert alert-success row">
                        <ul>
                            <?php foreach ($_SESSION['success'] as $message) : ?>
                                <li><?=$message?></li>
                            <?php endforeach;?>
                        </ul>
                        </div>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>

                    <?=$content?>
                </div>
            </div>
        </header>

        <!-- Portfolio section-->
        <section id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/public/assets/img/portfolio/fullsize/1.jpg"
                        ><img class="img-fluid" src="/public/assets/img/portfolio/thumbnails/1.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/public/assets/img/portfolio/fullsize/2.jpg"
                        ><img class="img-fluid" src="/public/assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/public/assets/img/portfolio/fullsize/3.jpg"
                        ><img class="img-fluid" src="/public/assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/public/assets/img/portfolio/fullsize/4.jpg"
                        ><img class="img-fluid" src="/public/assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/public/assets/img/portfolio/fullsize/5.jpg"
                        ><img class="img-fluid" src="/public/assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/public/assets/img/portfolio/fullsize/6.jpg"
                        ><img class="img-fluid" src="/public/assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Приветствую, меня зовут Дмитрий</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">И это мои контакты:</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+7 (999) 58-58-869</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i
                        ><a class="d-block" href="mailto:contact@yourwebsite.com">DVMorozov74@gmail.com</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="/public/js/scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="/public/css/datatables.min.css"/>
        <script type="text/javascript" src="/public/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="/public/js/dataTables.jqueryui.min.js"></script>
        <script type="text/javascript" src="/public/js/dataTables.scroller.min.js"></script>
        <script type="text/javascript" src="/public/js/jquery.uploadPreview.min.js"></script>
    </body>
</html>
