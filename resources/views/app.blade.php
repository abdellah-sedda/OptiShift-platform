<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
         <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        @vite(['resources/css/nucleo-icons.css', 'resources/css/nucleo-svg.css'])
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        @vite(['resources/css/material-dashboard.css'])
        <!-- Nepcha Analytics (nepcha.com) -->
        <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        
        @vite(['resources/js/app.js', 'resources/sass/app.scss'])

        @vite(['resources/js/material-dashboard.min.js',
            'resources/js/core/popper.min.js',
            'resources/js/core/bootstrap.min.js',
            'resources/js/plugins/perfect-scrollbar.min.js',
            'resources/js/plugins/smooth-scrollbar.min.js',
            'resources/js/plugins/chartjs.min.js'
        ])

        <!-- CSS Files -->
        {{-- <link id="pagestyle" href="./assets/css/material-kit.css?v=3.0.4" rel="stylesheet" /> --}}
    
    </head>
    <body class="antialiased">
        <div id="app"></div>
    </body>
</html>
