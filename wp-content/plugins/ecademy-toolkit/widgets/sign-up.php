<?php
/**
 * Signup Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Signup extends Widget_Base {

	public function get_name() {
        return 'eCademy_Signup';
    }

	public function get_title() {
        return __( 'Signup', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-button';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
	}
	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Signup',
			[
				'label' => __( 'eCademy Signup', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'image',
                [
                    'label' => __( 'Image', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => __( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Free Trial', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Sign Up for a Free Trial', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label' => __( 'Button Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Register Now', 'ecademy-toolkit'),
                ]
            );
            $this->add_control(
                'username_text',
                [
                    'label' => __( 'Username Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Username', 'ecademy-toolkit'),
                ]
            );
            $this->add_control(
                'email_text',
                [
                    'label' => __( 'Email Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Email', 'ecademy-toolkit'),
                ]
            );
            $this->add_control(
                'password_text',
                [
                    'label' => __( 'Password Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Password', 'ecademy-toolkit'),
                ]
            );
            $this->add_control(
                'r_password_text',
                [
                    'label' => __( 'Repeat Password Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Repeat Password', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'login_title',
                [
                    'label' => __( 'Login Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'login_link_title',
                [
                    'label' => __( 'Login Link Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'link_type',
                [
                    'label' => esc_html__( 'Login Link Type', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => [
                        '1'  => esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' => esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'link_to_page',
                [
                    'label' => esc_html__( 'Login Link Page', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'ex_link',
                [
                    'label'=>esc_html__('Login External Link', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'user_logeed_in',
			[
				'label' => __( 'Logged User Content', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'user_top_title',
                [
                    'label' => esc_html__( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Get Instant Access to the Free', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'user_title',
                [
                    'label' => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Self Development Course', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'user_title_tag',
                [
                    'label' => esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h2',
                ]
            );

            $this->add_control(
                'user_content',
                [
                    'label' => esc_html__( 'Content', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('With the open university you can study whenever and wherever you choose. We have students in over 128 countries, and a global reputation as a pioneer in the field of flexible learning. Our flexible teaching also means, if you travel often or need to relocate, you can continue to study wherever you go.', 'ecademy-toolkit'),
                ]
            );
            $this->add_control(
                'user_button_text',
                [
                    'label' 	=> esc_html__( 'Button Text', 'ecademy-toolkit' ),
                    'type' 		=> Controls_Manager::TEXT,
                    'default' 	=> __('Start For Free', 'ecademy-toolkit'),
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );

            $this->add_control(
                'btn_link_type',
                [
                    'label' 		=> esc_html__( 'Button Link Type', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' => [
                        '1'  	=> esc_html__( 'Link To Page', 'ecademy-toolkit' ),
                        '2' 	=> esc_html__( 'External Link', 'ecademy-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'btn_link_to_page',
                [
                    'label' 		=> esc_html__( 'Button Link Page', 'ecademy-toolkit' ),
                    'type' 			=> Controls_Manager::SELECT,
                    'label_block' 	=> true,
                    'options' 		=> ecademy_toolkit_get_page_as_list(),
                    'condition' => [
                        'link_type' => '1',
                    ]
                ]
            );

            $this->add_control(
                'btn_ex_link',
                [
                    'label'		=> esc_html__('Button External Link', 'ecademy-toolkit'),
                    'type'		=> Controls_Manager:: TEXT,
                    'condition' => [
                        'link_type' => '2',
                    ]
                ]
            );
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        // Get Button Link
        if($settings['link_type'] == 1 ):
            $link = get_page_link($settings['link_to_page']);
        else:
            $link = $settings['ex_link'];
        endif;

        // Get Button Link
        if($settings['btn_link_type'] == 1){
            $btn_link = get_page_link( $settings['btn_link_to_page'] );
        } else {
            $btn_link = $settings['btn_ex_link'];
        }
        $button_text = $settings['user_button_text']
		?>
        <div class="free-trial-area ptb-100 bg-fffaf3">
            <div class="container">
                <div class="row align-items-center">
                    <?php if( $settings['image']['url'] != '' ): ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="free-trial-image text-center">
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                <?php else: ?>
                    <div class="col-lg-12 col-md-12">
                <?php endif; ?>
                    <?php if ( !is_user_logged_in() || \Elementor\Plugin::$instance->editor->is_edit_mode() ) { ?>
                        <div class="free-trial-form">
                            <span class="sub-title"><?php echo $settings['top_title'] ?></span>
                            <h2><?php echo $settings['title'] ?></h2>

                            <form action="#" method="POST" name="register-form">
                                <fieldset>
                                    <div class="form-group">
                                        <input name="new_user_name" type="text" class="form-control" id="new-username" placeholder="<?php echo esc_attr( $settings['username_text'] ); ?>">
                                    </div>

                                    <div class="form-group">
                                        <input name="new_user_email" id="new-useremail" type="email" class="form-control" placeholder="<?php echo esc_attr( $settings['email_text'] ); ?>">
                                    </div>

                                    <div class="form-group">
                                        <input placeholder="<?php echo esc_attr( $settings['password_text'] ); ?>" id="new-userpassword" type="password" name="new_user_password" class="form-control" required="required">
                                    </div>

                                    <div class="form-group">
                                        <input placeholder="<?php echo esc_attr( $settings['r_password_text'] ); ?>" id="re-pwd" type="password" name="re-pwd" class="form-control" required="required">
                                    </div>

                                    <?php if( $settings['button_text'] != '' ): ?>
                                        <button type="submit" id="register-button" name="wp-submit"><?php echo $settings['button_text']; ?></button>
                                    <?php endif; ?>
                                </fieldset>
                            </form>
                            <?php if( $settings['login_title'] != '' || $settings['login_link_title'] != '' ): ?>
                                <p><?php echo esc_html( $settings['login_title'] ); ?> <a class="login" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $settings['login_link_title'] ); ?></a></p>
                            <?php endif; ?>

                            <p class="register-message alert alert-warning" style="display:none"></p>

                            <script type="text/javascript">
                                jQuery('#register-button').on('click',function(e){
                                    e.preventDefault();
                                    var newUserName = jQuery('#new-username').val();
                                    var newUserEmail = jQuery('#new-useremail').val();
                                    var newUserPassword = jQuery('#new-userpassword').val();
                                    jQuery.ajax({
                                    type:"POST",
                                    url:"<?php echo admin_url('admin-ajax.php'); ?>",
                                    data: {
                                        action: "register_user_front_end",
                                        new_user_name : newUserName,
                                        new_user_email : newUserEmail,
                                        new_user_password : newUserPassword
                                    },
                                    success: function(results){
                                        console.log(results);
                                        jQuery('.register-message').html(results).show();
                                    },
                                    error: function(results) {

                                    }
                                    });
                                });
                            </script>
                        </div>
                        <?php }else{ ?>
                            <div class="view-all-courses-content">
                                <span class="sub-title"><?php echo esc_html( $settings['user_top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['user_title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('user_title'); ?>><?php echo esc_html( $settings['user_title'] ); ?></<?php echo esc_attr( $settings['user_title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('user_content'); ?>><?php echo wp_kses_post( $settings['user_content'] ); ?></p>
                                <?php if( $button_text != '' ):
                                    // Button Icon
                                    if( $settings['button_icon'] != '' ):
                                        $icon = $settings['button_icon'];
                                    else:
                                        $icon = 'flaticon-agenda';
                                    endif;
                                ?>
                                    <a href="<?php echo esc_url( $btn_link ); ?>" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $button_text ); ?><span></span></a>
                                <?php endif; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Signup );