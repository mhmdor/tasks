<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon -->
    <link rel="icon" type="image/x-icon" href="assets/icons/fav-icon.png">
    <!-- Bootstap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap Icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
    <!-- Main css file -->
    <link rel="stylesheet" href="assets/style/main.css">

    <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">




    <title>Tasks System</title>
</head>

<body>

    <div class="overview clients d-flex">

        <div class="sidebar d-flex flex-column" id="sidebar">

            <button id="sidebarBtn">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"
                    height="20px" width="20px" version="1.1" id="Layer_1" viewBox="0 0 297 297" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path
                                    d="M279.368,24.726H102.992c-9.722,0-17.632,7.91-17.632,17.632V67.92c0,9.722,7.91,17.632,17.632,17.632h176.376     c9.722,0,17.632-7.91,17.632-17.632V42.358C297,32.636,289.09,24.726,279.368,24.726z" />
                                <path
                                    d="M279.368,118.087H102.992c-9.722,0-17.632,7.91-17.632,17.632v25.562c0,9.722,7.91,17.632,17.632,17.632h176.376     c9.722,0,17.632-7.91,17.632-17.632v-25.562C297,125.997,289.09,118.087,279.368,118.087z" />
                                <path
                                    d="M279.368,211.448H102.992c-9.722,0-17.632,7.91-17.632,17.633v25.561c0,9.722,7.91,17.632,17.632,17.632h176.376     c9.722,0,17.632-7.91,17.632-17.632v-25.561C297,219.358,289.09,211.448,279.368,211.448z" />
                                <path
                                    d="M45.965,24.726H17.632C7.91,24.726,0,32.636,0,42.358V67.92c0,9.722,7.91,17.632,17.632,17.632h28.333     c9.722,0,17.632-7.91,17.632-17.632V42.358C63.597,32.636,55.687,24.726,45.965,24.726z" />
                                <path
                                    d="M45.965,118.087H17.632C7.91,118.087,0,125.997,0,135.719v25.562c0,9.722,7.91,17.632,17.632,17.632h28.333     c9.722,0,17.632-7.91,17.632-17.632v-25.562C63.597,125.997,55.687,118.087,45.965,118.087z" />
                                <path
                                    d="M45.965,211.448H17.632C7.91,211.448,0,219.358,0,229.081v25.561c0,9.722,7.91,17.632,17.632,17.632h28.333     c9.722,0,17.632-7.91,17.632-17.632v-25.561C63.597,219.358,55.687,211.448,45.965,211.448z" />
                            </g>
                        </g>
                    </g>
                </svg>
            </button>

            <a href="/" class="d-flex"><img src="assets/icons/logo.png" alt=""></a>

            <div class="items d-flex flex-column gap-3" id="items">
                <a href="/" class="d-flex align-items-center gap-3 py-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M16.5332 3V5H12.7999V3H16.5332ZM7.19985 3V9H3.46652V3H7.19985ZM16.5332 11V17H12.7999V11H16.5332ZM7.19985 15V17H3.46652V15H7.19985ZM18.3999 1H10.9332V7H18.3999V1ZM9.06652 1H1.59985V11H9.06652V1ZM18.3999 9H10.9332V19H18.3999V9ZM9.06652 13H1.59985V19H9.06652V13Z"
                            fill="currentColor" />
                    </svg>
                    <span>Home</span>
                </a>
                <a href="{{ asset('tasks') }}" class="d-flex align-items-center gap-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                        <path
                            d="M12.1323 7.57373C13.193 8.34521 13.9363 9.39044 13.9363 10.7841V13.2727H17.0333V10.7841C17.0333 8.97566 14.2692 7.90555 12.1323 7.57373Z"
                            fill="currentColor" />
                        <path
                            d="M10.8394 6.63636C12.5505 6.63636 13.9364 5.15148 13.9364 3.31818C13.9364 1.48489 12.5505 0 10.8394 0C10.4755 0 10.1349 0.0829544 9.80969 0.199091C10.4523 1.05352 10.8394 2.14023 10.8394 3.31818C10.8394 4.49614 10.4523 5.58284 9.80969 6.43727C10.1349 6.55341 10.4755 6.63636 10.8394 6.63636Z"
                            fill="currentColor" />
                        <path
                            d="M6.19389 6.63636C7.90497 6.63636 9.29086 5.15148 9.29086 3.31818C9.29086 1.48489 7.90497 0 6.19389 0C4.48282 0 3.09692 1.48489 3.09692 3.31818C3.09692 5.15148 4.48282 6.63636 6.19389 6.63636ZM6.19389 1.65909C7.04556 1.65909 7.74238 2.40568 7.74238 3.31818C7.74238 4.23068 7.04556 4.97727 6.19389 4.97727C5.34223 4.97727 4.64541 4.23068 4.64541 3.31818C4.64541 2.40568 5.34223 1.65909 6.19389 1.65909Z"
                            fill="currentColor" />
                        <path
                            d="M6.19394 7.46582C4.12671 7.46582 0 8.57741 0 10.784V13.2726H12.3879V10.784C12.3879 8.57741 8.26117 7.46582 6.19394 7.46582ZM10.8394 11.6135H1.54848V10.7923C1.70333 10.195 4.10348 9.12491 6.19394 9.12491C8.28439 9.12491 10.6845 10.195 10.8394 10.784V11.6135Z"
                            fill="currentColor" />
                    </svg>
                    <span>Tasks</span>
                </a>
                <a href="{{ asset('categories') }}" class="d-flex align-items-center gap-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18Z"
                            fill="currentColor" />
                        <path
                            d="M6 14C7.10457 14 8 13.1046 8 12C8 10.8954 7.10457 10 6 10C4.89543 10 4 10.8954 4 12C4 13.1046 4.89543 14 6 14Z"
                            fill="currentColor" />
                        <path
                            d="M10 8C11.1046 8 12 7.10457 12 6C12 4.89543 11.1046 4 10 4C8.89543 4 8 4.89543 8 6C8 7.10457 8.89543 8 10 8Z"
                            fill="currentColor" />
                        <path
                            d="M14 14C15.1046 14 16 13.1046 16 12C16 10.8954 15.1046 10 14 10C12.8954 10 12 10.8954 12 12C12 13.1046 12.8954 14 14 14Z"
                            fill="currentColor" />
                    </svg>
                    <span>Categories</span>
                </a>

            </div>




            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                class="logout d-flex align-items-center gap-2">

                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path
                        d="M14 5L12.59 6.41L14.17 8H6V10H14.17L12.59 11.58L14 13L18 9L14 5ZM2 2H9V0H2C0.9 0 0 0.9 0 2V16C0 17.1 0.9 18 2 18H9V16H2V2Z"
                        fill="currentColor" />
                </svg>
                logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>

        <div class="page">

            <div class="navbar d-flex align-items-center justify-content-between">

                <div class="search">
                   
                </div>


                <div class="profile d-flex align-items-center gap-2">
                    <a href="/">
                        <div class="circle">AM</div>
                    </a>
                    <div class="data d-flex flex-column">
                        <h3>{{Auth::user()->name}}</h3>
                        <h4>{{Auth::user()->email}}</h4>
                    </div>
                </div>

            </div>

            <main class="py-4">
                @yield('content')
            </main>



            <div class="rights mb-4 mt-5">
                made with <span class="heart" style="color: red;">&#10084;</span> by <span>Tasks</span>.
            </div>
        </div>

    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>




    <script src="assets/js/index.js"></script>

    @yield('script')

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

    <!-- Chart js -->

    <script src="assets/js/chart.umd.js"></script>
    {{--
    <script>


        const ctx1 = document.getElementById('myChart1');

        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Complete'],
                datasets: [
                    {
                        label: '# of Votes',
                        data: [25, 75],
                        backgroundColor: ["#F2921F", "#2C3E83"]
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    </script> --}}

</body>

</html>