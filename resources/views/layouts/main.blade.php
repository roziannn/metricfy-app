<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png/jpg" href="/public/img/gracia1.jpg">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/870589c011.js" crossorigin="anonymous"></script>

    <!-- Add these lines to the head of your HTML document -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jura:wght@700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="icon" href="">

    <title>Metricfy Education</title>


    @stack('styles')

    {{-- Froala --}}
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    {{-- Froala --}}





</head>


<body>
    @include('sweetalert::alert')
    <div class="container">
        @yield('container')


        @if (!auth()->check() || (auth()->check() && auth()->user()->roles === 'USER'))
            @include('partials.footer')
        @endif


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    {{-- <script src="sweetalert2.min.js"></script> --}}

    <script src="sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editorQuestion = new FroalaEditor("#question")
            var editorDiscussion = new FroalaEditor("#discussion")
            var editorContent = new FroalaEditor("#content")
        });
    </script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        body {
            margin-top: 30px;
            background-color: #f5f5f5;

            color: #333;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }


        .bg-purple {
            /* background: #6a3093;
            background: -webkit-linear-gradient(to right, #a044ff, #6a3093);
            background: linear-gradient(to right, #a044ff, #6a3093); */

            /* biru base
            background: #00B4DB;
            background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
            background: linear-gradient(to right, #0083B0, #00B4DB);  */

            background: #4e54c8;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #8f94fb, #4e54c8);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #8f94fb, #4e54c8);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .text-purple {
            color: #35589A;
        }

        .bg-indigo {
            background: #4e54c8;
        }

        .breadcrumb {
            font-size: 15px;
        }

        .nav-logo {
            font-family: "Alexandria", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        .nav-item.dropdown .dropdown-item:active {
            background-color: rgb(68, 158, 254) !important;
        }

        .content-wrapper {
            margin-top: 100px;
        }

        .footer {
            padding: 20px 0px;
        }

        .btn-primary {
            padding: 8px
        }

        .blog-text {
            font-size: 14px;
        }

        a[id="fr-logo"] {
            display: none !important;
        }

        p[data-f-id="pbf"] {
            display: none !important;
        }

        a[href*="www.froala.com"] {
            display: none !important;
        }
    </style>
</body>

</html>
