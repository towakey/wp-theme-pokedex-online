<html lang="ja">
    <head>
        <title><?php wp_title('｜', true, 'right'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Google icon font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
        </style>
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="<?php echo get_home_url();?>" class="center brand-logo"><?php echo get_bloginfo('name');?></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li>
                            <!-- <a href="#">test1</a> -->
                        </li>
                    </ul>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav sidenav-fixed hide-on-large-only">
                <li><a href="#">First</a></li>
                <li><a href="#">Second</a></li>
            </ul>
        </header>
        <main>