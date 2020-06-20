<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title_head ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= $base_url_assets ?>images/favicon.ico">

        <!-- App css -->
        <link href="<?= $base_url_assets ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url_assets ?>css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url_assets ?>css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?= $base_url_assets ?>js/modernizr.min.js"></script>
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Baloo Bhai">

    </head>

    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?= $base_url_assets ?>images/bg-02.gif');
                                      background-size: 87%;
                                      background-position: left bottom;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="#" class="text-success">
                                    <!-- <span><img src="<?= $base_url_assets ?>images/logo.png" alt="" height="26"></span> -->
                                    <span style="font-family: 'Baloo Bhai', serif; font-size: 16.5px; font-weight: bold"><?=$slogan?></span>
                                </a>
                            </h2>

                            <form class="" action="<?= base_url().'Login/verifyAccount' ?>" method="post">

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        
                                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Gõ ID">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" required id="password" placeholder="Gõ pass">
                                    </div>
                                </div>

                                

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit"><i class="mdi mdi-chevron-double-right"></i></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright"><?= $title_foot ?></p>
            </div>

        </div>


        <!-- jQuery  -->
        <script src="<?= $base_url_assets ?>js/jquery.min.js"></script>
        <script src="<?= $base_url_assets ?>js/popper.min.js"></script>
        <script src="<?= $base_url_assets ?>js/bootstrap.min.js"></script>
        <script src="<?= $base_url_assets ?>js/waves.js"></script>
        <script src="<?= $base_url_assets ?>js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="<?= $base_url_assets ?>js/jquery.core.js"></script>
        <script src="<?= $base_url_assets ?>js/jquery.app.js"></script>

    </body>
</html>