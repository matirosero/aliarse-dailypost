            <!-- Footer -->
            <footer class="site-footer">
                <!-- Widgets Area -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                            <div class="widgets-area">
                                <div class="row">
                                   <?php if( is_active_sidebar( 'footer_widgets' )) dynamic_sidebar('footer_widgets'); ?>

                                   <?php if( is_active_sidebar( 'footer_widget_left' )) :
                                        echo '<div class="col-md-4">';
                                        dynamic_sidebar('footer_widget_left'); 
                                        echo '</div>';
                                    endif; ?>
                                   <?php if( is_active_sidebar( 'footer_widget_right' )) :
                                        echo '<div class="col-md-8">';
                                        dynamic_sidebar('footer_widget_right'); 
                                        echo '</div>';
                                    endif; ?>
                                </div>
                            </div>

                            <div class="social-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="social-block clean-list">
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
                                                            <a href="<?php echo esc_url(_go('social_platforms_' . $platform)); ?>"><i class="fa fa-<?php echo esc_attr($platform); ?>" title="<?php echo esc_attr($platform); ?>"></i> <?php echo esc_attr($platform); ?></a>
                                                        </li>
                                                    <?php endif;
                                                endforeach; 
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <?php if(!_go('display_subscribe')): ?>
                                        <form class="subscribe-form" id="newsletter" method="post" data-tt-subscription>
                                            <input type="text" name="email" class="form-input" placeholder="<?php _e('E-mail address','dailypost');?>"  data-tt-subscription-required data-tt-subscription-type="email" />
                                            <input type="submit" class="form-submit" value="<?php _e('Subscribe','dailypost');?>" />
                                            <div class="result_container"></div>
                                        </form>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Copyrights -->
                <div class="copyrights align-center">
                    <div class="container-fluid">
                        <p>
                            <?php if(_go('footer_info')): 
                                _eo('footer_info');
                            else:?>
                                <?php esc_attr_e('Copyright ','dailypost'); echo date('Y').' '; esc_attr_e('Designed and Developed by ','dailypost');?><a href="<?php echo esc_url('https://www.teslathemes.com/'); ?>" target="_blank"><?php esc_attr_e('TeslaThemes','dailypost'); ?></a>, <?php esc_attr_e('Supported by ', 'dailypost');?><a href="<?php echo esc_url('https://wpmatic.io/'); ?>" target="_blank"><?php esc_attr_e('WPmatic','dailypost');?></a>
                            <?php endif;?>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
     <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php wp_footer(); ?>
</body>
</html>