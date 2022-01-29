<?php get_header()?>
<div class="container">
    <header class="row">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="http://placekitten.com/g/20/20" alt=""></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Buscar">
                        </div>
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <section class="row">
        <div class="jumbotron">
            <h1><?php bloginfo('name'); ?></h1>
            <p>
                <?php bloginfo('description'); ?>
            </p>
            <a href="#" class="btn btn-primary btn-lg">Saber mas</a>
        </div>
    </section>
    <section class="row">

        <?php
        $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 4 ) );
        if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();
        ?>
        <article class="col-md-3 col-sm-6">
            <picture class="thumbnail">
                <?php
                    if ( has_post_thumbnail( ) ) {
                        the_post_thumbnail( array( 242, 220) );
                    } else {
                        ?><img src="http://placekitten.com/g/242/200" alt="">
                <?php
                    }
                    ?>
                <div class="caption">
                    <h3 class="text-center"><?php the_title( )?></h3>
                    <p class="text-justify">
                        <?php substr(the_excerpt(), 0, 200) ?>
                    </p>
                </div>
            </picture>
        </article>
        <?php
        endwhile;
        else :
        __( 'Lo sentimos, no hay entradas que coincidan con su búsqueda.', 'trimentes' );
        endif;
        ?>
    </section>

    <?php get_footer()?>