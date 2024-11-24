<?php
    require __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use Slim\Factory\AppFactory;
    use Slim\Views\PhpRenderer;

    $app = AppFactory::create();

    $container = $app->getContainer();

    // Database configuration
    $container['db'] = function ($c) {
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        return new PDO($dsn, $user, $pass);
    };

    // View configuration
    $container['view'] = function ($container) {
        $settings = $container->get('settings');
        return new PhpRenderer($settings['view']['template_path']);
    };

    $container['settings']['displayErrorDetails'] = true; // Set to false in production
    $container['settings']['addContentLengthHeader'] = false; // Allow the web server to add the content-length header
    $container['settings']['determineRouteBeforeAppMiddleware'] = true;
    $container['settings']['view'] = [
        'template_path' => __DIR__ . '/../src/views',
        'extension' => 'php'
    ];

    $app->setBasePath('/blog'); // Set base path for routing

    $app->add(function ($req, $res, $next) {
        try {
            $response = $next($req, $res);
        } catch (PDOException $e) {
            return $response->withStatus(500)
                            ->withHeader('Content-Type', 'text/html')
                            ->write("Erreur de base de données : " . $e->getMessage());
        } catch (\Exception $e) {
            return $response->withStatus(500)
                            ->withHeader('Content-Type', 'text/html')
                            ->write("Erreur interne du serveur : " . $e->getMessage());
        }
        return $response;
    });

    $app->add(function ($req, $res, $next) {
        $path = $req->getUri()->getPath();
        if (strpos($path, '/admin') === 0 && !isAdminLoggedIn($req)) {
            return $res->withRedirect('/admin/login');
        }
        return $next($req, $res);
    });


    // Routes (with sanitization)
    $app->get('/', function ($req, $res, $args) use ($container) {
        $posts = \App\Models\Post::all($container['db']);
        return $res->render('posts/index.php', ['posts' => $posts]);
    });

    $app->get('/post/{id}', function ($req, $res, $args) use ($container) {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
        $controller = new \App\Controllers\PostController();
        return $controller->show($container['db'], $req, $res, $id);
    });

    $app->get('/admin', function ($req, $res) {
        return $res->render('admin/index.php');
    });

    $app->get('/admin/create', function ($req, $res) {
        return $res->render('admin/create.php');
    });

    $app->post('/admin/create', function ($req, $res, $args) use ($container) {
        $title = filter_var($req->getParam('title'), FILTER_SANITIZE_STRING);
        $content = filter_var($req->getParam('content'), FILTER_SANITIZE_STRING);
        $controller = new \App\Controllers\PostController();
        return $controller->create($container['db'], $req, $res, $title, $content);
    });

    $app->get('/admin/edit/{id}', function ($req, $res, $args) use ($container) {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
        $controller = new \App\Controllers\PostController();
        return $controller->edit($container['db'], $req, $res, $id);
    });

    $app->post('/admin/update/{id}', function ($req, $res, $args) use ($container) {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($req->getParam('title'), FILTER_SANITIZE_STRING);
        $content = filter_var($req->getParam('content'), FILTER_SANITIZE_STRING);
        $controller = new \App\Controllers\PostController();
        return $controller->update($container['db'], $req, $res, $id, $title, $content);
    });

    $app->get('/admin/delete/{id}', function ($req, $res, $args) use ($container) {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
        $controller = new \App\Controllers\PostController();
        return $controller->delete($container['db'], $req, $res, $id);
    });

    $app->get('/admin/login', function ($req, $res) {
        return $res->render('admin/login.php');
    });

    $app->post('/admin/login', function ($req, $res) {
        $username = $req->getParam('username');
        $password = $req->getParam('password');
        if ($username === 'admin' && $password === 'password') {
            return $res->withRedirect('/admin', 302)->withHeader('Set-Cookie', 'admin_logged_in=true; Path=/blog/admin');
        } else {
            return $res->withRedirect('/admin/login', 302)->withHeader('Set-Cookie', 'admin_logged_in=false; Path=/blog/admin');
        }
    });

    $app->get('/admin/logout', function ($req, $res) {
        return $res->withRedirect('/admin/login', 302)->withHeader('Set-Cookie', 'admin_logged_in=false; Path=/blog/admin; Expires=Thu, 01 Jan 1970 00:00:00 GMT');
    });

    function isAdminLoggedIn($req) {
        return $req->getCookieParam('admin_logged_in') === 'true';
    }

    $app->run();
    ?>
