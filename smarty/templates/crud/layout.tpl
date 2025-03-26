<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Blog - {block name="title"}{/block}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
    <link href="/asset/css/crud.css" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navtop">
    <div>
        <h1>Blog</h1>
        <a href="/crud/users.php"><i class="fas fa-users"></i>Users</a>
        <a href="/crud/posts.php"><i class="fas fa-address-book"></i>Posts</a>
        <a href="/logout.php">Logout</a>
    </div>
</nav>

{block name="content"}{/block}

</body>
</html>