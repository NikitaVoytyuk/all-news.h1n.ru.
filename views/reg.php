<?php defined("CATALOG") or die("Access denied"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="<?=PATH?>views/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">News site:</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="menu">
            <li class="active"><a href="<?=PATH;?>">Home</a></li>
            <li><a href="#">About</a></li>
            <li>
                <a href=""><?=$categories_menu;?></a>
            </li>
        </ul>
        <script>
            $(document).ready(function () {

                $('#navbar ul li').hover(
                    function () {
                        $('ul:first', this).slideDown(150);
                    },
                    function () {
                        $('ul:first', this).slideUp(150);
                    }
                );

            });
        </script>
        <div class="wrapper">
            <div class="sidebar">
                <?php require_once 'sidebar.php'; ?>
            </div>
            <div class="content">
                <h3>Регистрация</h3>

                <?php if(isset($_SESSION['reg']['success'])): ?>
                    <div class="ok"><?=$_SESSION['reg']['success']?></div>

                <?php elseif(!isset($_SESSION['auth']['user'])): ?>
                    <div class="form">
                        <form action="<?=PATH?>reg" method="post">
                            <p>
                                <label for="name_reg">Имя:</label>
                                <input type="text" name="name_reg" id="name_reg">
                            </p>
                            <p>
                                <label for="email_reg">Email:</label>
                                <input class="access" type="text" data-field="email" name="email_reg" id="email_reg">
                                <span></span>
                            </p>
                            <p>
                                <label for="login_reg">Логин:</label>
                                <input class="access" type="text" data-field="login" name="login_reg" id="login_reg">
                                <span></span>
                            </p>
                            <p>
                                <label for="password_reg">Пароль:</label>
                                <input type="password" name="password_reg" id="password_reg">
                            </p>
                            <p class="submit">
                                <input type="submit" value="Зарегистрироваться" name="reg">
                            </p>
                        </form>
                    </div>

                    <?php if(isset($_SESSION['reg']['errors'])): ?>
                        <br><div class="error"><?=$_SESSION['reg']['errors'];?></div>
                    <?php endif; ?>

                <?php endif; unset($_SESSION['reg']); ?>

            </div>
        </div>
        <script src="<?=PATH?>views/js/jquery-1.9.0.min.js"></script>
        <script src="<?=PATH?>views/js/jquery.accordion.js"></script>
        <script src="<?=PATH?>views/js/jquery.cookie.js"></script>
        <script>
            $(document).ready(function(){


                $(".access").change(function(){
                    var $this = $(this);
                    var val = $.trim($this.val());
                    var dataField = $this.attr('data-field');
                    var span = $this.next();

                    if(val == ''){
                        span.removeClass().addClass('reg-cross');
                    }else{
                        span.removeClass().addClass('reg-loader');
                        $.ajax({
                            url: '<?=PATH?>reg',
                            type: 'POST',
                            data: {val: val, dataField: dataField},
                            success: function(res){
                                if(res == 'no'){
                                    span.removeClass().addClass('reg-cross');
                                }else{
                                    span.removeClass().addClass('reg-check');
                                }
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            var refresh = false;
            $( window ).on("beforeunload", function( event ) {
                var msg = "Все несохраненные данные будут утеряна!";
                if ( $( event.target.activeElement ).is("a") || refresh === true ) {
                    return;
                }
                return msg;
            });
        </script>
        <script src="<?=PATH?>views/js/workscrips.js"></script>
</body>
</html>
