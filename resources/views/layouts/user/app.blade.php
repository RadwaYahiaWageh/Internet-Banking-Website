<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body,
        html {
            height: 100%;
            /* Ensure the minimum height for the entire document */
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            /* Stack elements vertically */
        }

        #content {
            flex: 1;
            /* Ensures that the content section takes up the available space */
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url("{{ URL::to('/') }}/user/image/5f9ccabf-9074-42a0-97be-f6bb814c23aa.jpg");
            /* Ensure the image path is correct */
            /* background-size: cover; */
            background-position: center;
            background-blend-mode: overlay;
            /* background-color: rgba(244, 244, 244, 0.8); */
            /* Increased opacity */
            padding-top: 60px;
        }

        .menu {
            background-color: #335eea;
            color: #ffffff;
            width: 100%;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .menu a:hover,
        .dropdown-content a:hover {
            color: #A4EBF3;
        }

        .info-boxes {
            width: 60%;
            /* Adjustment for better spacing */
            display: flex;
            justify-content: space-between;
            /* Better distribution */
            margin-top: 100px;
            /* More top margin to avoid overlap with menu */
            z-index: 10;
        }

        .box {
            flex: 1;
            /* Flexible boxes that adjust */
            margin: 0 10px;
            /* Space between boxes */
            padding: 20px;
            background: #335eea;
            /* Teal background for a pop of color */
            border-radius: 10px;
            /* Rounded corners for modern look */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Subtle shadow */
            text-align: center;
            font-size: 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        table {
            width: 90%;
            /* Match the info-boxes width */
            border-collapse: collapse;
            margin: 40px 0;
            /* More vertical space */
            border-radius: 10px;
            /* Rounded corners for tables */
            overflow: hidden;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            /* More pronounced shadow */
        }

        th,
        td {
            padding: 15px;
            /* More padding for better spacing */
            text-align: left;
            border-bottom: 2px solid #eeeeee;
            /* Subtle borders */
        }

        th {
            background-color: #335eea;
            /* Darker teal for headers */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f7f5f5;
            /* Alternating row color for better readability */
        }

        tr {
            background-color: white;
        }

        tr:hover {
            background-color: #e0f7fa;
            /* Light blue for hover */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1001;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        footer {
            width: 100%;
            padding: 20px 0;
            background-color: #335eea;
            color: white;
            text-align: center;
            z-index: 1000;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        footer a {
            color: white;
            padding: 0 10px;
        }

        footer a:hover {
            color: #A4EBF3;
        }

        .image-container {
            width: 80%;
            margin: 20px 0;
            display: flex;
            justify-content: space-around;
        }

        .image-container img {
            width: 30%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .form-container {
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 98%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #335eea;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #05343f;
        }
    </style>
    <style>
        .custom-alert {
            position: fixed;
            bottom: 70px;
            right: 50px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
            /* Adjust z-index as needed */
        }

        .custom-alert-close {
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: inherit;
            outline: none;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="menu">
            <a href="{{ route('user-history') }}">History</a>
            <a href="{{ route('user-transaction') }}">Transaction</a>
            <a href="{{ route('user-bills') }}">Pay Bill</a>
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">{{ ucfirst(Auth::user()->name) }}</a>
                <div class="dropdown-content">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @yield('content')
        @if (session('success'))
            <div id="custom-alert" class="custom-alert">
                <span id="custom-alert-message">{{ session('success') }}</span>
                <button class="custom-alert-close" onclick="closeCustomAlert()">Close</button>
            </div>
        @endif
    </div>
    <footer>
        &copy; 2024 Internet Banking System. All Rights Reserved.
    </footer>
    <script>
        function showCustomAlert(message) {
            var customAlert = document.getElementById('custom-alert');
            var customAlertMessage = document.getElementById('custom-alert-message');
            customAlertMessage.innerText = message;
            customAlert.style.display = 'block';
        }

        function closeCustomAlert() {
            var customAlert = document.getElementById('custom-alert');
            customAlert.style.display = 'none';
        }

        // Show the custom alert if there's a success message
        @if (session('success'))
            showCustomAlert('{{ session('success') }}');
        @endif
    </script>
</body>

</html>
