<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap starter</title>
    <link rel="stylesheet" type="text/css" href="static/content/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="static/content/site.css" />
    <script src="static/scripts/modernizr-2.6.2.js"></script>
    <script src="static/scripts/jquery-1.10.2.js"></script>
    <script src="static/scripts/bootstrap.js"></script>
    <script src="static/scripts/respond.js"></script>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?">My personal blog</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="?">Home</a></li>
                <?php if(IS_ADMIN): ?>
                    <li><a href="?act=logout">Admin (Logout)</a></li>
                <?php else: ?>
                    <li><a href="?act=login">Login</a></li>
                <?php endif?>
            </ul>
        </div>
    </div>
</div>

<div class="container starter-template">
