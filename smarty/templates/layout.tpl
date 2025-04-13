<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>RackForest blog - {block name='title'}{/block}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/asset/css/blog.css"/>

    {block name='header'}{/block}
</head>
<body>
    <header class="container-fluid logo-header"></header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 header-section text-center">
                <h1>Welcome to Rackforest's Blog</h1>
                <h3>Let's read the newest subjects</h3>
            </div>
            <div class="col-xs-12">
                {block name='body'}{/block}
            </div>
        </div>
    </div>
</body>
</html>
