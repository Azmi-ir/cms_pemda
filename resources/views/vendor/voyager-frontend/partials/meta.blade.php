<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', setting('site.title'))</title>
    <meta name="description" content="@yield('meta_description')">

    <!-- Open Graph -->
    <meta property="og:site_name" content="{{ setting('site.title') }}" />
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="@yield('meta_image', url('/') . '/images/apple-touch-icon.png')" />
    <meta property="og:description" content="@yield('meta_description', setting('site.description'))" />

    <!-- Icons -->
    <meta name="msapplication-TileImage" content="{{ url('/') }}/ms-tile-icon.png" />
    <meta name="msapplication-TileColor" content="#8cc641" />
    <link rel="shortcut icon" href="/storage/{{ setting('admin.icon_image') }}" />
    <link rel="apple-touch-icon-precomposed" href="/storage/{{ setting('admin.icon_image') }}" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/app.css">

    @if (setting('site.google_analytics_tracking_id'))
        <!-- Google Analytics (gtag.js) -->
        <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');

        </script>
    @endif
    @if (setting('admin.google_recaptcha_site_key'))
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        <script>
            function setFormId(formId) {
                window.formId = formId;
            }

            function onSubmit(token) {
                document.getElementById(window.formId).submit();
            }

        </script>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=606b1ade3166d20011624e4a&product=inline-share-buttons"
        async="async"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&amp;display=swap" rel="stylesheet">
    <style>
        /** #-282f34 #-089c9e #-184424*/
        body {

            font-family: 'Roboto', sans-serif;

            font-size: 14px;
            line-height: 20px;
            font-weight: 400;
            color: #454545;
            background-color: #f6f6f6;
            overflow-x: hidden;
            -webkit-text-size-adjust: 100%;
            -webkit-overflow-scrolling: touch;
            -webkit-font-smoothing: antialiased !important;
            text-align: justify;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
        }

        h5 {
            font-family: 'Montserrat', sans-serif;
        }

        hr {
            border-bottom: 2px solid #c7c7c7;
        }

        footer.top-footer {
            background-color: {{ setting('site.color_1') }};margin-top: auto;
        }

        footer.bottom-footer {
            background-color: {{ setting('site.color_1') }};
        }

        .top-bar,
        .top-bar ul {
            background-color: {{ setting('site.color_1') }};
            color: #f6f6f6
        }

        a,
        p {
            color: #454545;
        }

        a:hover {
            color: {{ setting('site.color_1') }}
        }

        .top-bar,
        .top-bar ul {
            background-color: {{ setting('site.color_1') }};
            border-bottom: 4px solid {{ setting('site.color_1') }};
        }

        .dropdown.menu>li>a {
            background: none;
        }

        .top-bar .top-bar-right a {
            color: #f6f6f6;
            font-weight: bold;
        }

        .top-bar .top-bar-right a:hover {
            color: #f6f6f6;
            font-weight: bold;
        }

        .dropdown.menu>li.is-dropdown-submenu-parent>a::after {
            border-color: #f6f6f6 transparent transparent;
	}
	.dropdown.menu > li.is-active > a {
  	  background: transparent;
	  color: #f6f6f6;
	}
        .menu a,
        .menu .button {
            color: #f6f6f6;
			font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }

        .orbit-bullets button {
            width: 9px;
            height: 9px;
            margin: 9px;
            border-radius: 0;
            background-color: #cacaca;
        }

        .orbit-bullets button.is-active {
            background-color: {{ setting('site.color_1') }};
        }

        .tetews {
            background-color: {{ setting('site.color_1') }};
        }

        .map-responsive {
            overflow: hidden;
            padding-bottom: 40%;
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
			background-color: black;
        }
		.gmap_canvas{	
			opacity: 50%;
		}
        .menu.submenu {
            z-index: 99;
        }
        .oorbit-custom {height: 100vh;}
		.article-author {
			font-size: 10px;
		}
		.thumbnail {
			border: solid 3px #b7b7b7;
			margin-bottom:0;
		}
		.card-section {
			text-align: center;
		}
		.img-siku {
			max-width: 100%;
			max-height: 90%;
			background-position: center center;
			background-repeat: no-repeat;
			
		}
		.mini-foto {
			background-color: {{ setting('site.color_1') }};
			color: #f6f6f6;
		}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
	crossorigin="anonymous"></script>
    <script>
	$(document).ready(function(){
		window.scrollTo(0, 7);
	});
    </script>
</head>

<body>
