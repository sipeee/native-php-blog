<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Blog - {block name="title"}{/block}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <link href="/asset/css/crud.css" rel="stylesheet" type="text/css" />
    {block name='header'}{/block}
</head>
<body>
<nav class="navtop">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-xs-3">
                    <h1>Blog</h1>
                </div>
                <div class="col-md-8 col-xs-9">
                    <a href="/logout.php">Logout</a>
                    <a href="/crud/posts.php"><i class="fas fa-address-book"></i>Posts</a>
                    <a href="/crud/users.php"><i class="fas fa-users"></i>Users</a>
                </div>
            </div>
        </div>
    </div>
</nav>

{block name="content"}{/block}

</body>
</html>