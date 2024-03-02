<?php
namespace Block;

if (!class_exists('Siteheader')) {
	class Siteheader
	{
		/*
		|--------------------------------------------------------------------------
		| Private methods
		|--------------------------------------------------------------------------
		*/

		// Render the primary menu.
		private function renderMenuPrimary()
		{
			if (isset($_GET['amp'])) {
				echo mountainside_amp_nav_menu();
				// return wp_nav_menu(array('theme_location' => 'primary-header-menu', 'echo' => false));
			} else {
				return wp_nav_menu(array('theme_location' => 'primary-header-menu', 'echo' => false));
			}
			
		}

		// Render the secondary menu.
		private function renderMenuSecondary()
		{
			return wp_nav_menu(array('theme_location' => 'secondary-header-menu', 'echo' => false));
		}

			// Render the first footer sidebar.
			private function renderHeaderbarFirst()
			{
				if (is_active_sidebar('siteheader-first')) {
					ob_start();
					dynamic_sidebar('siteheader-first');
					$sidebar = ob_get_contents();
					ob_end_clean();
					$faustSettings = get_option( 'faustwp_settings', array() );
					if (!empty($faustSettings['frontend_uri'])) {
						$sidebar = str_replace(home_url(), $faustSettings['frontend_uri'], $sidebar);
					}
					return $sidebar;
				}
			}
		
			// Render the second footer sidebar.
			private function renderHeaderbarSecond($mtsPhone = false)
			{
				if (is_active_sidebar('siteheader-second')) {
					ob_start();
					dynamic_sidebar('siteheader-second');
					$sidebar = ob_get_contents();
					ob_end_clean();
					$parts = explode('/',$_SERVER['REQUEST_URI']);
					if ((!empty($parts[1]) && ($parts[1] == 'blog')) || (!empty($mtsPhone) && $mtsPhone == 'blog')) {
						$phone = str_replace(' ', ' ', get_field('blog_general_phone_no', 'option'));
						if (!empty($phone)) {
							$sidebar = '<span class="phone"><a href="tel:+1' . $phone . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0-beta1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M284.6 181.9c-10.28-8.344-25.41-6.875-33.75 3.406C242.4 195.6 243.9 210.7 254.2 219.1c11.31 9.25 17.81 22.69 17.81 36.87c0 14.19-6.5 27.62-17.81 36.87c-10.28 8.406-11.78 23.53-3.375 33.78c4.719 5.812 11.62 8.812 18.56 8.812c5.344 0 10.75-1.781 15.19-5.406c22.53-18.44 35.44-45.4 35.44-74.05S307.1 200.4 284.6 181.9zM345.1 107.1c-10.22-8.344-25.34-6.907-33.78 3.343c-8.406 10.25-6.906 25.37 3.344 33.78c33.88 27.78 53.31 68.18 53.31 110.9s-19.44 83.09-53.31 110.9c-10.25 8.406-11.75 23.53-3.344 33.78c4.75 5.781 11.62 8.781 18.56 8.781c5.375 0 10.75-1.781 15.22-5.438C390.2 367.1 416 313.1 416 255.1S390.2 144.9 345.1 107.1zM406.4 33.15c-10.22-8.344-25.34-6.875-33.78 3.344c-8.406 10.25-6.906 25.37 3.344 33.78C431.9 116.1 464 183.8 464 255.1s-32.09 139.9-88.06 185.7c-10.25 8.406-11.75 23.53-3.344 33.78c4.75 5.781 11.62 8.781 18.56 8.781c5.375 0 10.75-1.781 15.22-5.438C473.5 423.8 512 342.6 512 255.1S473.5 88.15 406.4 33.15zM151.3 174.6C161.1 175.6 172.1 169.5 176 159.6l33.75-84.38C214 64.35 209.1 51.1 200.2 45.86l-67.47-42.17C123.2-2.289 110.9-.8945 102.9 7.08C-34.32 144.3-34.31 367.7 102.9 504.9c7.982 7.984 20.22 9.379 29.75 3.402l67.48-42.19c9.775-6.104 13.9-18.47 9.598-29.3L176 352.5c-3.945-9.963-14.14-16.11-24.73-14.97l-53.24 5.314C78.89 286.7 78.89 225.4 98.06 169.3L151.3 174.6z"/></svg> <span class="blog-phone-top">' . $phone . '</span></a></span>';
						}
					}
					if ((!empty($parts[1]) && ($parts[1] == 'cafe')) || (!empty($mtsPhone) && $mtsPhone == 'cafe')) {
						$phone = '860-824-7876';
						$phone_clean = '8608247876';
						if (!empty($phone)) {
							$sidebar = '<span class="phone"><a href="tel:+1' . $phone_clean . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0-beta1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M284.6 181.9c-10.28-8.344-25.41-6.875-33.75 3.406C242.4 195.6 243.9 210.7 254.2 219.1c11.31 9.25 17.81 22.69 17.81 36.87c0 14.19-6.5 27.62-17.81 36.87c-10.28 8.406-11.78 23.53-3.375 33.78c4.719 5.812 11.62 8.812 18.56 8.812c5.344 0 10.75-1.781 15.19-5.406c22.53-18.44 35.44-45.4 35.44-74.05S307.1 200.4 284.6 181.9zM345.1 107.1c-10.22-8.344-25.34-6.907-33.78 3.343c-8.406 10.25-6.906 25.37 3.344 33.78c33.88 27.78 53.31 68.18 53.31 110.9s-19.44 83.09-53.31 110.9c-10.25 8.406-11.75 23.53-3.344 33.78c4.75 5.781 11.62 8.781 18.56 8.781c5.375 0 10.75-1.781 15.22-5.438C390.2 367.1 416 313.1 416 255.1S390.2 144.9 345.1 107.1zM406.4 33.15c-10.22-8.344-25.34-6.875-33.78 3.344c-8.406 10.25-6.906 25.37 3.344 33.78C431.9 116.1 464 183.8 464 255.1s-32.09 139.9-88.06 185.7c-10.25 8.406-11.75 23.53-3.344 33.78c4.75 5.781 11.62 8.781 18.56 8.781c5.375 0 10.75-1.781 15.22-5.438C473.5 423.8 512 342.6 512 255.1S473.5 88.15 406.4 33.15zM151.3 174.6C161.1 175.6 172.1 169.5 176 159.6l33.75-84.38C214 64.35 209.1 51.1 200.2 45.86l-67.47-42.17C123.2-2.289 110.9-.8945 102.9 7.08C-34.32 144.3-34.31 367.7 102.9 504.9c7.982 7.984 20.22 9.379 29.75 3.402l67.48-42.19c9.775-6.104 13.9-18.47 9.598-29.3L176 352.5c-3.945-9.963-14.14-16.11-24.73-14.97l-53.24 5.314C78.89 286.7 78.89 225.4 98.06 169.3L151.3 174.6z"/></svg> <span class="blog-phone-top">' . $phone . '</span></a></span>';
						}
					}
					return $sidebar;
				}
			}
		
			// Render the third footer sidebar.
			private function renderHeaderbarThird()
			{
				if (is_active_sidebar('siteheader-third')) {
					ob_start();
					dynamic_sidebar('siteheader-third');
					$sidebar = ob_get_contents();
					ob_end_clean();
					return $sidebar;
				}
			}
		/*
		|--------------------------------------------------------------------------
		| Main render method to return HTML
		|--------------------------------------------------------------------------
		*/
		public function render($mtsPhone = false)
		{
			$menuPrimary   = $this->renderMenuPrimary();
			$menuSecondary = $this->renderMenuSecondary();
                       $faustSettings = get_option( 'faustwp_settings', array() );
                       if (!empty($faustSettings['frontend_uri'])) {
                               $homeurl       = $faustSettings['frontend_uri'];
                       } else {
                               $homeurl       = home_url('/');
                       }
			$blogname      = get_bloginfo('name');
			$themeuri      = get_stylesheet_directory_uri();
			$header_color = get_field('header_color');
			$header_color = !empty($header_color) ? 'dark' : '';

			$widget1 = $this->renderHeaderbarFirst();
			$widget2 = $this->renderHeaderbarSecond($mtsPhone);
			$widget3 = $this->renderHeaderbarThird();

			//Slim Promo values
			$promo_enabled = get_field('enable_promo', 'option');
			$promo = '';
			if (!empty($promo_enabled)) {
				$promo_content = get_field('promo_content', 'option');
				$promo_link = get_field('promo_link', 'option');
				$promo_link_url = !empty($promo_link['url']) ? $promo_link['url'] : '';
				$promo_link_title = !empty($promo_link['title']) ? $promo_link['title'] : '';
				$promo_link_target = !empty($promo_link['target']) ? ' target="' . $promo_link['target'] .'"' : '';
				$promo .= '<div class="promo">';
				$promo .= '<div class="promo-content">' . $promo_content . '</div>';
				if (!empty($promo_link_url)) {
					$promo .= '<div class="promo-link"><a href="' . $promo_link_url . '" class="" ' . $promo_link_target . '> ' . $promo_link_title . '</a></div>';
				}
				$promo .= '</div>';
			}


		if (is_404()) {
			$header_color = 'dark';
		}
		
			return <<<HTML
	<header class="block-siteheader affix $header_color" role="banner">
			$promo
		<div class="container full container_header">
			<div class="container-inner">
				<div class="block-siteheader-layout">
					<a class="block-siteheader-logolink" href="$homeurl" rel="home">
						<img width="541" height="84" class="block-siteheader-logo" src="$themeuri/images/logo_2x-new.png" alt="$blogname Logo">
					</a>
					<a id="search_amp" href="#" class="search_trigger" on="tap:search_amp.toggleClass(class=clicked),search_top_amp.toggleClass(class=active)">
						<i class="fas fa-search"></i>
					</a>
					<div id="search_top_amp" class="search_top">
						$widget1
					</div>
					<div class="top_phone">
						$widget2
					</div>
					$widget3
				</div>
			</div>
		</div>

		<nav class="block-siteheader-nav block-siteheader-nav-hidden" role="navigation">
			<div class="navigation-wrapper container">
				$menuPrimary
				$menuSecondary
				
			</div>
		</nav>

		<div class="custom_popup">
			<div class="popup_content">
				<a href="#" class="popup_close"><i class="fas fa-times"></i></a>
				<div class="message">
					Merry Christmas from the Mountainside team!
				</div>
			</div>
		</div>
	</header>
	HTML;
		}
	}
}
