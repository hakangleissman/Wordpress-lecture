<?php
get_header();
?>
<!-- Start the Loop. -->
<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <main>
            <section>
                <div class="container">
                    <div class="row">
                        <div id="primary" class="col-xs-12 col-md-9">
                            <article>
                                <img src="<?php the_post_thumbnail_url() ?>" />
                                <h1 class="title">
                                    <?php the_title() ?>
                                </h1>
                                <ul class="meta">
                                    <li>
                                        <i class="fa fa-calendar"></i>
                                        <?php the_time('j F, Y'); ?>
                                    </li>
                                    <li>
                                        <i class="fa fa-user"></i> <a href="forfattare.html">
                                            <?php the_author_posts_link(); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-tag"></i>
                                        <?php the_category(', '); ?>
                                    </li>
                                </ul>
                                <?php the_content() ?>
                            </article>
                        </div>

                        <aside id="secondary" class="col-xs-12 col-md-3">
                            <div id="sidebar">
                                <ul>
                               <?php
                                   dynamic_sidebar("secondary sidebar");
                                ?>
                                </ul>
                            </div>
                        </aside>

                    </div>
                </div>
            </section>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
?>