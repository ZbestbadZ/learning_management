<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Learning Management</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .app {
            width: 100%;
        }

        /* Clear float khác sau các cột */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .header1 {
            overflow: hidden;
            background-color: #58257b;
        }

        .header2 {
            margin-left: 70px;
        }

        .header1 a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }


        .header1 a:hover {
            background-color: #db7093;
            color: white;
            font-weight: bold
        }

        .leftcolumn {
            float: left;
            width: 75%;
        }

        .rightcolumn {
            float: left;
            width: 24%;
        }

        @media screen and (max-width: 700px) {

            .leftcolumn,
            .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }


        @media screen and (max-width: 300px) {
            .header1 a {
                float: none;
                width: 100%;
            }
        }

        .header1 .search-container {
            float: right;
        }

        .header1 input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .header1 .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: rgba(108, 112, 109, 0.753);
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .header1 .search-container button:hover {
            background: rgb(248, 97, 97);
        }

        @media screen and (max-width: 600px) {
            .header1 .search-container {
                float: none;
            }

            .header1 a,
            .header1 input[type=text],
            .header1 .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }

            .header1 input[type=text] {
                border: 1px solid #ccc;
            }
        }

        .counter.counter-lg {
            top: -24px !important;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        i,
        span {
            display: inline-block;
        }

        .expand_caret {
            transform: scale(1.6);
            margin-left: 8px;
            margin-top: -4px;
        }

        a[aria-expanded='false']>.expand_caret {
            transform: scale(1.6) rotate(-90deg);
        }

        .huyhoang {
            background-color: rgb(65, 113, 185);
        }

    </style>
</head>
