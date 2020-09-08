<!doctype html>
<html lang="en">
<head>
<title><?=$model->title?></title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- Material Kit CSS -->
<link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<link href="assets/css/nicole.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <div class="login-card">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto">
                        <?= Html::form_init([
                                "id" => "login_form",
                                "action" => "Login/login"
                            ]);
                        ?>
                        <div class="card">
                            <div class="card-header card-header-info">
                            <?= Html::text("Login", ["type"  => "h4","class" => "card-title"]); ?>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <?= 
                                    Html::input($model, [
                                        "type"        => "text",
                                        "class"       => "form-control",
                                        "name"        => "f_utilizador",
                                        "placeholder" => "Utilizador",
                                        "required"        => "",
                                        "error-control"   => true,
                                        "form-group-class"=>"form-group"
                                    ]);
                                    ?>
                                </div>
                                <div class="col">
                                    <?= 
                                    Html::input($model, [
                                        "type" => "password",
                                        "class"=> "form-control",
                                        "name"   => "f_password",
                                        "placeholder" => "Password",
                                        "required" => '',
                                        "error-control"=>true,
                                        "form-group-class"=>"form-group"
                                    ]);
                                    ?>
                                </div>
                                <div class="col">
                                    <?=
                                    Html::button("Entrar", [
                                        "type" => "submit",
                                        "name" => "form-submit",
                                        "class"=> "btn btn-sm btn-info"
                                    ]);
                                    ?>      
                                </div>
                            </div>
                            </div>
                        </div>
                        <?= Html::form_end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="custom-footer">
            <?=include('footer.php')?>
        </footer>
    </div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<script src="assets/js/nicole.js" type="text/javascript"></script>
</body>
</html>