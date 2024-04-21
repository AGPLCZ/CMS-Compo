<!doctype html>
<html lang="cs">

<head>
  <meta charset="utf-8">
  <title>dobrodruzi.cz | Svoboda Respekt Zodpovědnost</title>


  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Nabízíme nástroje na udržení osobní svobody">
  <meta name="author" content="dobrodruzi.cz">



  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo $this->url ?>/images/favicon.png" type="image/x-icon">
  <link rel="icon" href="<?php echo $this->url ?>/images/favicon.png" type="image/x-icon">


  
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


  <!-- plugins -->
  <link rel="stylesheet" href="<?php echo $this->url ?>/plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $this->url ?>/plugins/bootstrap-icons-1.11.3/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo $this->url ?>/plugins/slick/slick.css">
  <link href="<?php echo $this->url ?>/iconpro/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">




	<link rel="stylesheet" type="text/css" href="<?php echo $this->url ?>/assets/template/mizzle/css/swiper-bundle.min.css">

  	<!-- Theme CSS -->
  <link rel="stylesheet" href="<?php echo $this->url ?>/assets/template/mizzle/css/style.css" media="screen">




  <style>
    .navbar-nav .nav-item .nav-link {
      text-transform: none !important;
    }


  </style>

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

</head>

<body>