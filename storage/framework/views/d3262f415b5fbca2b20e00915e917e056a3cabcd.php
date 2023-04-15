<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <style>
        body {
            background-color: #0069A5;
            font-family: 'Montserrat', sans-serif;
        }

        .signup-form h2,
        .reset-form h2 {
            color: #1a2341;
            text-align: center;
            margin-bottom: 10%;
        }


        .signup-form,
        .reset-form {
            border-radius: 3px;
            margin-bottom: 15px;
            background-color: #f2f3f7;
            box-shadow: 0px 2prgb(184, 184, 184)gba(0, 0, 0, 0.3);
            padding: 20px;
            width: 700px;
            margin: 0 auto;
            font-size: 15px;
        }

        .loginup-form button[id="button-login"],
        .signup-form button[id="button-save"] {
            background-color: #0069A5;
            color: #f2f3f7;
            font-size: 16px;
            min-width: 140px;
            outline: none !important;
        }


        .loginup-form button[id="button-save"] {
            background-color: #0069A5;
            color: #f2f3f7;
            font-size: 16px;
            min-width: 140px;
            outline: none !important;
        }

        .text-center[id="havent_register"] {
            color: #f2f3f7;

        }

        .text-center a[id="link_register"] {
            color: #f2f3f7;
            text-decoration: underline;
        }

        .form-group,
        .signup-form {
            margin-bottom: 20px;
        }

        .text-center a[id="forgot_user"] {
            color: #0b0b0b;
        }

        .signup-form .form-select[id="rol_register"] {
            margin-top: 20px;
            margin-bottom: 15px;

        }

        .navbar[ id="nav_header"]{
            background-color:  #1a2341;
           
        }

        .navbar[ id="nav_header"] .navbar-brand{
            color: #f2f3f7;
            font-family: 'Montserrat', sans-serif;
        }
        .aside{
            background-color:  #1A2341;
            color: #f2f3f7;
        }
 
     
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="nav_header">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Proyecto Trabajo
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\xampp\Proyecto-Taller-de-Ingenieria-de-Software-2-mmadariaga\resources\views/layouts/app.blade.php ENDPATH**/ ?>