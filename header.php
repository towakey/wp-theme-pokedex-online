<html lang="ja">
    <head>
        <title><?php wp_title('｜', true, 'right'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="<?php
            if(is_single()){
                $tags=get_the_tags();
                if(!empty($tags))
                {
                    echo "pokedex-online,blog,";
                    foreach($tags as $tag)
                    {
                        echo $tag->name;
                        if(next($tags))
                        {
                            echo ",";
                        }
                    }
                }
            }else{
                echo "pokedex-online";
            }
        ?>">
        <meta name="description" content="<?php
            if(is_single()){
                single_post_title( '', true );
            }else{
                bloginfo( 'name' );
                // echo " - ";
                // bloginfo( 'description' );
            }
        ?>">
        <!-- Google icon font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
            body{
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            main{
                flex: 1 0 auto;
            }
        </style>
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <nav class="grey lighten-1">
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
        <?php //var_dump( $wp_rewrite ); ?>