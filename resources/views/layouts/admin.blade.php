<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Sha Klinic - Admin Dashboard </title>

        @include('components.admin.css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    </head>

    <body>
        @include('components.admin.loader')
        <div id="main-wrapper">
            @include('components.admin.navhead')
            @include('components.admin.header')
            @include('components.admin.sidebar')
            @yield('admin-content')
            @include('components.admin.footer')

        </div>

        <!-- Required vendors -->


        @include('components.admin.js')

    </body>

</html>