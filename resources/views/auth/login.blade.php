<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/fav-icon.png">
    <!-- Bootstap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Main css file -->
    <link rel="stylesheet" href="../assets/style/main.css">

    <title> Login</title>
</head>

<body class="login">


    <!-- Login Nav Starts -->
    <div class="login-header d-flex align-items-center justify-content-center">

        {{-- <a href="/"><img src="../assets/icons/logo.png" alt=""></a> --}}

    </div>
    <!-- Login Nav Ends -->

    <!-- Login Form Start -->
    <div class="login-form d-flex justify-content-center">
        <div class="box bg-white">
            <h2 class="mb-4 text-center">Welcome Back</h2>
            <form method="POST" action="{{route('login')}}">
                @csrf

                <div class="input mb-4">
                    <label for="in1" class="mb-2">Email Address</label>
                    <div class="input-icon">
                        <input name="email" class="@error('email') is-invalid @enderror" type="email" id="in1" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M8 10C5.32571 10 0 11.3371 0 14V16H16V14C16 11.3371 10.6743 10 8 10ZM2.67429 13.7143C3.63429 13.0514 5.95429 12.2857 8 12.2857C10.0457 12.2857 12.3657 13.0514 13.3257 13.7143H2.67429ZM8 8C10.2057 8 12 6.20571 12 4C12 1.79429 10.2057 0 8 0C5.79429 0 4 1.79429 4 4C4 6.20571 5.79429 8 8 8ZM8 2.28571C8.94857 2.28571 9.71429 3.05143 9.71429 4C9.71429 4.94857 8.94857 5.71429 8 5.71429C7.05143 5.71429 6.28571 4.94857 6.28571 4C6.28571 3.05143 7.05143 2.28571 8 2.28571Z"
                                fill="#8F8F8F" />
                        </svg>
                    </div>
                </div>
                <div class="input mb-4">
                    <label for="in2 " class="mb-2">Password</label>
                    <div class="input-icon">
                        <input name="password" class="@error('password') is-invalid @enderror" type="password" id="in2" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="12" viewBox="0 0 22 12" fill="none">
                            <path
                                d="M1 10H21V12H1V10ZM2.15 5.95L3 4.47L3.85 5.95L5.15 5.2L4.3 3.72H6V2.22H4.3L5.15 0.75L3.85 0L3 1.47L2.15 0L0.85 0.75L1.7 2.22H0V3.72H1.7L0.85 5.2L2.15 5.95ZM8.85 5.2L10.15 5.95L11 4.47L11.85 5.95L13.15 5.2L12.3 3.72H14V2.22H12.3L13.15 0.75L11.85 0L11 1.47L10.15 0L8.85 0.75L9.7 2.22H8V3.72H9.7L8.85 5.2ZM22 2.22H20.3L21.15 0.75L19.85 0L19 1.47L18.15 0L16.85 0.75L17.7 2.22H16V3.72H17.7L16.85 5.2L18.15 5.95L19 4.47L19.85 5.95L21.15 5.2L20.3 3.72H22V2.22Z"
                                fill="#8F8F8F" />
                        </svg>
                    </div>
                </div>
                <div class="check d-flex align-items-center gap-2 mb-4">
                    <label for="remember">Dont Have Account : </label>
                    <a href="{{route('register')}}" type="checkbox" id="remember">Create New Account</a>

                </div>
                <button type="submit">login</button>
            </form>
        </div>
    </div>
    <!-- Login Form Ends -->

    <!-- Footer Starts -->
    <div class="login-footer">
        <p>© 2025 <span>Tasks</span> All rights reserved.</p>
    </div>
    <!-- Footer Ends -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>