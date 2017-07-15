<!--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="<?/*=PATH_ADMIN*/?>views/css/style.css">
    <link rel="stylesheet" href="<?/*=PATH*/?>views/css/smoothness/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">News site:</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="menu">
            <li class="active"><a href="<?/*=PATH;*/?>">Home</a></li>
            <li><a href="#">About</a></li>
            <li>
            </li>
        </ul>
        <form action="<?/*=PATH*/?>search/" method="get">
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
-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <link rel="stylesheet" href="<?=PATH_ADMIN?>views/css/style.css" />
    <link rel="stylesheet" href="<?=PATH_ADMIN?>views/bootstrap/css/bootstrap.min.css" />
</head>
<body>

<div class="header"> <!-- class="header" -->

    <div class="wrap"> <!-- class="wrap" -->

        <div class="logo">
            <h1>
                <a href="<?=PATH?>">All-<span>news</span></a>
            </h1>
         
        </div>
    </div> <!-- class="/wrap" -->

</div> <!-- class="/header" -->


<div class="menu"> <!-- class="menu" -->
    <?php require 'menu.php' ?>
</div> <!-- class="/menu" -->