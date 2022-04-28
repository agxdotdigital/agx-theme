<?php

namespace AGXTheme\Includes\Settings;

use Elementor\Plugin;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Core\Responsive\Responsive;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Settings_Header extends Tab_Base {

	public function get_id() {
		return 'agx-settings-header';
	}

	public function get_title() {
		return __( 'Header', 'agx-theme' );
	}

	public function get_icon() {
		return 'eicon-header';
	}

	public function get_help_url() {
		return '';
	}

	public function get_group() {
		return 'theme-style';
	}

	protected function register_tab_controls() {
		$this->start_controls_section(
			'agx_header_section',
			[
				'tab' => 'agx-settings-header',
				'label' => __( 'Header', 'agx-theme' ),
			]
		);

		$this->add_control(
			'agx_header_logo_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Site Logo', 'agx-theme' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'agx-theme' ),
				'label_off' => __( 'Hide', 'agx-theme' ),
			]
		);

		$this->add_control(
			'agx_header_tagline_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Tagline', 'agx-theme' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'agx-theme' ),
				'label_off' => __( 'Hide', 'agx-theme' ),
			]
		);

		$this->add_control(
			'agx_header_menu_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label' => __( 'Menu', 'agx-theme' ),
				'default' => 'yes',
				'label_on' => __( 'Show', 'agx-theme' ),
				'label_off' => __( 'Hide', 'agx-theme' ),
			]
		);

		$this->add_control(
			'agx_header_layout',
			[
				'type' => Controls_Manager::SELECT,
				'label' => __( 'Layout', 'agx-theme' ),
				'options' => [
					'default' => __( 'Default', 'agx-theme' ),
					'inverted' => __( 'Inverted', 'agx-theme' ),
					'stacked' => __( 'Centered', 'agx-theme' ),
				],
				'selector' => '.site-header',
				'default' => 'default',
			]
		);

		$this->add_control(
			'agx_header_width',
			[
				'type' => Controls_Manager::SELECT,
				'label' => __( 'Width', 'agx-theme' ),
				'options' => [
					'boxed' => __( 'Boxed', 'agx-theme' ),
					'full-width' => __( 'Full Width', 'agx-theme' ),
				],
				'selector' => '.site-header',
				'default' => 'boxed',
			]
		);

		$this->add_responsive_control(
			'agx_header_custom_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Content Width', 'agx-theme' ),
				'size_units' => [
					'%',
					'px',
				],
				'range' => [
					'px' => [
						'max' => 2000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'condition' => [
					'agx_header_width' => 'boxed',
				],
				'selectors' => [
					'.site-header .header-inner' => 'width: {{SIZE}}{{UNIT}}; max-width: 100%;',
				],
			]
		);

		$this->add_responsive_control(
			'agx_header_gap',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Gap', 'agx-theme' ),
				'size_units' => [
					'%',
					'px',
				],
				'default' => [
					'size' => '0',
				],
				'range' => [
					'px' => [
						'max' => 2000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'.site-header' => 'padding-right: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}}',
				],
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'agx_header_layout',
							'operator' => '!=',
							'value' => 'stacked',
						],
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'agx_header_background',
				'label' => __( 'Background', 'agx-theme' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '.site-header',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'agx_header_logo_section',
			[
				'tab' => 'agx-settings-header',
				'label' => __( 'Site Logo', 'agx-theme' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'agx_header_logo_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'agx_header_logo_type',
			[
				'label' => __( 'Type', 'agx-theme' ),
				'type' => Controls_Manager::SELECT,
				'default' => ( has_custom_logo() ? 'logo' : 'title' ),
				'options' => [
					'logo' => __( 'Logo', 'agx-theme' ),
					'title' => __( 'Title', 'agx-theme' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'agx_header_logo_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => __( 'Logo Width', 'agx-theme' ),
				'description' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s logo', 'agx-theme' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'size_units' => [
					'%',
					'px',
					'vh',
				],
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'condition' => [
					'agx_header_logo_display' => 'yes',
					'agx_header_logo_type' => 'logo',
				],
				'selectors' => [
					'.site-header .site-branding .site-logo img' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'agx_header_title_color',
			[
				'label' => __( 'Text Color', 'agx-theme' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'agx_header_logo_display' => 'yes',
					'agx_header_logo_type' => 'title',
				],
				'selectors' => [
					'.site-header h1.site-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'agx_header_title_typography',
				'label' => __( 'Typography', 'agx-theme' ),
				'description' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'agx-theme' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'condition' => [
					'agx_header_logo_display' => 'yes',
					'agx_header_logo_type' => 'title',
				],
				'selector' => '.site-header h1.site-title',
			]
		);

		$this->add_control(
			'agx_header_title_link',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'agx-theme' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'content_classes' => 'elementor-control-field-description',
				'condition' => [
					'agx_header_logo_display' => 'yes',
					'agx_header_logo_type' => 'title',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'agx_header_tagline',
			[
				'tab' => 'agx-settings-header',
				'label' => __( 'Tagline', 'agx-theme' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'agx_header_tagline_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'agx_header_tagline_color',
			[
				'label' => __( 'Text Color', 'agx-theme' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'agx_header_tagline_display' => 'yes',
				],
				'selectors' => [
					'.site-header .site-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'agx_header_tagline_typography',
				'label' => __( 'Typography', 'agx-theme' ),
				'condition' => [
					'agx_header_tagline_display' => 'yes',
				],
				'selector' => '.site-header .site-description',
			]
		);

		$this->add_control(
			'agx_header_tagline_link',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => sprintf( __( 'Go to <a href="%s">Site Identity</a> to manage your site\'s title and tagline', 'agx-theme' ), wp_nonce_url( 'customize.php?autofocus[section]=title_tagline' ) ),
				'content_classes' => 'elementor-control-field-description',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'agx_header_menu_tab',
			[
				'tab' => 'agx-settings-header',
				'label' => __( 'Menu', 'agx-theme' ),
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => 'agx_header_menu_display',
							'operator' => '=',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$available_menus = wp_get_nav_menus();

		$menus = [ '0' => __( '— Select a Menu —', 'agx-theme' ) ];
		foreach ( $available_menus as $available_menu ) {
			$menus[ $available_menu->term_id ] = $available_menu->name;
		}

		if ( 1 === count( $menus ) ) {
			$this->add_control(
				'agx_header_menu_notice',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'agx-theme' ) . '</strong><br>' . sprintf( __( 'Go to <a href="%s" target="_blank">Menus screen</a> to create one.', 'agx-theme' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		} else {
			$this->add_control(
				'agx_header_menu',
				[
					'label' => __( 'Menu', 'agx-theme' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'agx-theme' ), admin_url( 'nav-menus.php' ) ),
				]
			);

			$this->add_control(
				'agx_header_menu_warning',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => __( 'Changes will be reflected in the preview only after the page reloads.', 'agx-theme' ),
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);

			$this->add_control(
				'agx_header_menu_layout',
				[
					'label' => __( 'Menu Layout', 'agx-theme' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'horizontal',
					'options' => [
						'horizontal' => __( 'Horizontal', 'agx-theme' ),
						'dropdown' => __( 'Dropdown', 'agx-theme' ),
					],
					'frontend_available' => true,
				]
			);

			$breakpoints = Responsive::get_breakpoints();

			$this->add_control(
				'agx_header_menu_dropdown',
				[
					'label' => __( 'Breakpoint', 'agx-theme' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'tablet',
					'options' => [
						/* translators: %d: Breakpoint number. */
						'mobile' => sprintf( __( 'Mobile (< %dpx)', 'agx-theme' ), $breakpoints['md'] ),
						/* translators: %d: Breakpoint number. */
						'tablet' => sprintf( __( 'Tablet (< %dpx)', 'agx-theme' ), $breakpoints['lg'] ),
						'none' => __( 'None', 'agx-theme' ),
					],
					'selector' => '.site-header',
					'condition' => [
						'agx_header_menu_layout!' => 'dropdown',
					],
				]
			);

			$this->add_control(
				'agx_header_menu_color',
				[
					'label' => __( 'Color', 'agx-theme' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'agx_header_menu_display' => 'yes',
					],
					'selectors' => [
						'.site-header .site-navigation ul.menu li a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'agx_header_menu_toggle_color',
				[
					'label' => __( 'Toggle Color', 'agx-theme' ),
					'type' => Controls_Manager::COLOR,
					'condition' => [
						'agx_header_menu_display' => 'yes',
					],
					'selectors' => [
						'.site-header .site-navigation-toggle i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'agx_header_menu_typography',
					'label' => __( 'Typography', 'agx-theme' ),
					'condition' => [
						'agx_header_menu_display' => 'yes',
					],
					'selector' => '.site-header .site-navigation .menu li',
				]
			);
		}

		$this->end_controls_section();
	}

	public function on_save( $data ) {
		// Save chosen header menu to the WP settings.
		if ( isset( $data['settings']['agx_header_menu'] ) ) {
			$menu_id = $data['settings']['agx_header_menu'];
			$locations = get_theme_mod( 'nav_menu_locations' );
			$locations['menu-1'] = (int) $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	public function get_additional_tab_content() {
		if ( ! defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			return sprintf( '
				<div class="agx-theme elementor-nerd-box">
					<img src="%4$s" class="elementor-nerd-box-icon">
					<div class="elementor-nerd-box-message">
						<p class="elementor-panel-heading-title elementor-nerd-box-title">%1$s</p>
						<p>%2$s</p>
					</div>
					<a class="elementor-button elementor-button-default elementor-nerd-box-link" target="_blank" href="https://elementor.com/pro/?utm_source=panel-widgets&amp;utm_campaign=gopro&amp;utm_medium=wp-dash&amp;utm_term=agxtheme">%3$s</a>
				</div>
				',
				__( 'Create a custom header with multiple options', 'agx-theme' ),
				__( 'Upgrade to Elementor Pro and enjoy free design and many more features', 'agx-theme' ),
				__( 'Go Pro', 'agx-theme' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} else {
			return sprintf( '
				<div class="agx-theme elementor-nerd-box">
					<img src="%4$s" class="elementor-nerd-box-icon">
					<div class="elementor-nerd-box-message">
						<p class="elementor-panel-heading-title elementor-nerd-box-title">%1$s</p>
						<p class="elementor-nerd-box-message">%2$s</p>
					</div>
					<a class="elementor-button elementor-button-success elementor-nerd-box-link" target="_blank" href="%5$s">%3$s</a>
				</div>
				',
				__( 'Create a custom header with the new Theme Builder', 'agx-theme' ),
				__( 'With the new Theme Builder you can jump directly into each part of your site', 'agx-theme' ),
				__( 'Create Header', 'agx-theme' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg',
				get_admin_url( null, 'admin.php?page=elementor-app#/site-editor/templates/header' )
			);
		}
	}
}
