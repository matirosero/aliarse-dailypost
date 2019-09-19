<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
     <!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php echo "<script type='text/javascript'>var TemplateDir='".TT_THEME_URI."'</script>" ?>
	<?php wp_head(); ?>
</head>
<body id="front-page" <?php body_class();?>>
     <?php if(wp_nav_menu( array( 'echo' => FALSE, 'theme_location' => 'secondary_menu', 'fallback_cb' => 'false') )):?>
    <!-- Side menu toggle -->
    <span class="side-menu-toggle">
        <i class="icon icon-left-menu"></i>
    </span>
    <?php endif;?>

    <!-- Page Sidemenu -->
    <div id="side-menu">
        <div class="side-menu-container">
            <div class="side-menu-wrapper">
                <a class="identity" href="<?php echo home_url(); ?>" style="<?php _estyle_changer('logo_text') ?>" >
                    <?php if(_go('logo_image_side')): ?>
                        <img src="<?php _eo('logo_image_side') ?>" alt="<?php echo THEME_PRETTY_NAME ?>">
                    <?php elseif(_go('logo_text')): ?>
                        <?php _eo('logo_text') ?>
                    <?php else: ?>
                        <?php echo THEME_PRETTY_NAME; ?>
                    <?php endif; ?>
                </a>

                <ul class="clean-list page-main-links">
                    <?php wp_nav_menu( array( 
                        'title_li'=>'',
                        'theme_location' => 'secondary_menu',
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'fallback_cb' => 'wp_list_pages'
                        ));
                    ?>
                </ul>

                <ul class="clean-list social-block">
                    <?php 
                        $social_platforms = array(
                            'facebook',
                            'twitter',
                            'dribbble',
                            'youtube',
                            'rss',
                            'google',
                            'linkedin',
                            'pinterest',
                            'instagram'
                        );

                        foreach($social_platforms as $platform): 
                            if (_go('social_platforms_' . $platform)):?>
                                <li>
                                    <a href="<?php echo esc_url(_go('social_platforms_' . $platform)); ?>"><i class="fa fa-<?php echo esc_attr($platform); ?>" title="<?php echo esc_attr($platform); ?>"></i></a>
                                </li>
                            <?php endif;
                        endforeach; 
                    ?>
                </ul>
            </div> 
        </div>
    </div>

    <div id="page">
        <?php if(is_single()):?>
        <!-- Story text share popup -->
        <div class="share-story-text-popup">
            <div class="popup-header" data-share-option="twitter">
                <span class="share-option-icon" data-share-icon="twitter"></span>
                <span class="close-popup"><?php _e('Close','dailypost');?></span>
            </div>

            <div class="share-block-wrapper">
                <div class="share-block">
                    <h4 class="block-title"><?php _e('What your are sharing','dailypost');?></h4>

                    <div class="share-message"></div>

                    <div class="btn-wrapper align-center">
                        <a href="#" class="btn template-btn-1" target="_blank"><?php _e('Share','dailypost');?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <?php if(is_single()):?>
            <!-- Story Progress -->
            <div class="progress-block" data-current-post-id>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="progress-block-wrapper">
                                        <h4 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

                                        <div class="progress-container">
                                            <span class="actual-progress"></span>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="post-settings-wrapper">
                                <ul class="post-settings clean-list">
                                    <?php echo tt_share_header();?>
                                    <li class="setting comments <?php if(!comments_open( ) || !have_comments()) echo 'hidden';?>">
                                        <span class="title"><?php _e('Comment','dailypost');?></span>
                                        <div class="icon-wrapper">
                                            <i class="icon icon-comments">
                                                <span class="nr-of-comments"><?php comments_number('0','1','%');?></span>
                                            </i>
                                        </div>
                                    </li>
                                    <li class="setting print">
                                        <span class="title"><?php _e('Print','dailypost');?></span>
                                        <div class="icon-wrapper">
                                            <i class="icon icon-printer"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paragraph share block -->
            <div class="quote-block">
                <input type="hidden" class="quote-text" value="" />
                <ul class="share-options clean-list">
                    <li class="option facebook" data-option="facebook">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="option twitter" data-option="twitter">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="option quote" data-option="quote">
                        <a href="#"><i class="icon-quote"></i></a>
                    </li>
                </ul>
            </div>
            <?php endif;?>
            <!-- Search Panel -->
            <div class="search-panel">
                <span class="search-panel-close"><?php _e('close','dailypost');?></span>
                <div class="container-fluid">
                    <form class="main-search-form" method="get" role="search" action="<?php echo home_url('/') ?>">
                        <div class="input-line">
                            <input type="text" name="s" id="s" class="search-input" placeholder="<?php _e('Search','dailypost');?>" autocomplete="off"/>
                            <button class="search-submit"><i class="icon-magnifier"></i></button>
                        </div>

                        <ul id="search-results" class="clean-list"></ul>
                    </form>
                </div>
            </div>

            <!-- Header -->
            <header>
                <div class="main-header-wrapper">
                    <!-- Main Header content -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <a class="site-identity" href="<?php echo home_url(); ?>" style="<?php _estyle_changer('logo_text') ?>" >
                                    <?php if(_go('logo_image')): ?>
                                        <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME ?>">
                                    <?php elseif(_go('logo_text')): ?>
                                        <?php _eo('logo_text') ?>
                                    <?php else: ?>
                                        <?php echo THEME_PRETTY_NAME; ?>
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="col-md-9 col-lg-9">
                                <div class="row">
                                    <div class="col-md-9 col-lg-10">
                                        <div class="news-banner" style="margin-top:10px;">
                                            <?php 
                                                // $cutoff = mro_get_cutoff();
                                                $posts_query = new WP_Query(array(
                                                    'post_type' => 'banner',
                                                    'orderby' => 'date',
                                                    'order' => 'ASC',
                                                    'posts-per-page' => 1,
                                                    'meta_query' => array(array('key' => '_thumbnail_id')) 
                                                    // 'date_query'     => array(
                                                    //     'after' =>  $cutoff,
                                                    // ),
                                                ));
                                            ?>
                                            <?php if($posts_query->have_posts()):?>
                                            
                                                <?php while($posts_query->have_posts()) : $posts_query->the_post();
                                                   
                                                    the_post_thumbnail( 'full' );
                                                endwhile; ?>
                                            </p>
                                            <?php endif; wp_reset_postdata(); ?>
                                        </div>
                                    </div><!-- .breaking-news -->
                                    <div class="col-md-3 col-lg-2">
                                        <div class="main-social-block">
                                            <ul class="social-platforms clean-list">
                                                <?php if(_go('head_platforms_facebook')):
                                                    $trans_f = get_transient('head_platforms_facebook');
                                                    if(!empty($trans_f)) {
                                                        $count_f = $trans_f;
                                                    } else {
                                                        $facebook = wp_remote_retrieve_body( wp_remote_get('https://graph.facebook.com/'._go('head_platforms_facebook').'?access_token=802909029854829|04f9921c0fd17bbfa1f82037ee9581ac&fields=likes', array('timeout'=> 5)));
                                                        $likes = json_decode($facebook);
                                                        $count_f = !empty($likes->likes) ? $likes->likes : 0;
                                                        set_transient('head_platforms_facebook', $count_f, 5 * HOUR_IN_SECONDS);
                                                    }
                                                ?>
                                                <li class="platform align-center">  
                                                    <span class="title"><?php _e('Facebook','dailypost');?></span>
                                                    <a href="http://facebook.com/<?php _eo('head_platforms_facebook');?>" target="_blank" class="facebook">
                                                        <span class="counter"><?php //echo $count_f;?></span>
                                                    </a>
                                                </li>
                                                <?php endif;?>

                                                <?php if(_go('head_platforms_twitter')):
                                                    $trans_t = get_transient('head_platforms_twitter');
                                                    if(!empty($trans_t)) {
                                                        $count_t = $trans_t;
                                                    } else {
                                                        $twitter = wp_remote_retrieve_body( wp_remote_get('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='._go('head_platforms_twitter'), array('timeout'=> 5)));
                                                        $followers = json_decode($twitter);
                                                        $count_t = !empty($followers[0]->followers_count) ? $followers[0]->followers_count : 0;
                                                        set_transient('head_platforms_twitter', $count_t, 5 * HOUR_IN_SECONDS);
                                                    }
                                                ?>
                                                 <li class="platform align-center">
                                                    <span class="title"><?php _e('Twitter','dailypost');?></span>
                                                    <a href="http://twitter.com/<?php _eo('head_platforms_twitter');?>" target="_blank" class="twitter">
                                                        <span class="counter"><?php echo $count_t;?></span>
                                                    </a>
                                                </li>
                                                <?php endif;?>  
                                            </ul>
                                        </div><!-- .main-social-block -->
                                    </div>
                                </div><!-- .row -->
                                <nav class="main-nav align-center">
                                    <ul class="clean-list">
                                        <?php wp_nav_menu( array( 
                                            'title_li'=>'',
                                            'theme_location' => 'main_menu',
                                            'container' => false,
                                            'items_wrap' => '%3$s',
                                            'fallback_cb' => 'wp_list_pages'
                                            ));
                                        ?>
                                    </ul>
                                    <span class="search-panel-toggle no-select">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </nav>
                            </div>


                        </div>
                    </div>
                </div>
            </header>
