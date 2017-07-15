<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$options['site_title']?></title>
    <link rel="stylesheet" href="<?=PATH?>views/style.css">
    <script src="<?=PATH?>views/js/jquery-1.9.0.min.js"></script>
    <script src="<?=PATH?>views/js/workscrips.js"></script>
    <link rel="stylesheet" href="<?=PATH?>views/css/smoothness/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?=PATH?>css/cupertino/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->

</head>
<body>
<div class="header"> <!-- class="header" -->

    <div class="wrap"> <!-- class="wrap" -->

        <div class="logo">
            <h1>
                <a href="<?=PATH?>">World<span>News</span></a>
            </h1>
            <p>Самые актуальные <br /> новости</p>
        </div>

        <div class="slogan">
            Добро пожаловать на новостной канал
            <span>где вы прочтете самые свежие новости!</span>
        </div>

    </div> <!-- class="/wrap" -->

</div> <!-- class="/header" -->
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
        <form action="<?=PATH?>search/" method="get">
            <ul class="search">
                <li>
                    <input type="text" id="autocomplete" class="search" name="search" />
                </li>
                <li>
                    <input type="submit" class="search-go" name="go-search" value="поиск"  />
                </li>
            </ul>
        </form>
    </div>
</div>