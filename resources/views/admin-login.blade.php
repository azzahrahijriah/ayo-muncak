<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Admin Login</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <script src="{{ asset('asset/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('asset/js/config.js') }}"></script>
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-card {
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="card form-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Login Admin</h5>
                <small class="text-muted float-end">Admin AyoMuncak</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAR5JREFUSEvVlF0OATEUhe/shJVgJ6wEK8FKsBJ2wnzJbdKp256GzIMmHkzT8537O9jMZ5hZ33oBCzM7mdnazJ7+O47/b8pgD2Dr4qUWoMv48dCCKACOry6AY8SIBujeI9m1IlEA0oJYEs/NpshI06YWhQI83PHS3eY6RMI9qeI+PL8AEHy5alVHAcg/dYhSRD2ow9nMqMNXEeRpSB2TFxlR8l9tVxUBAslp5BDnRFA9PQAezzpoalib9yoC0rPyQkeTTIveW9NcA9A5DBmp6TmAwomOAPl6qD50OAZoVd6EHRUB0vQ2+zsLq9xNk6kuAV37JchZ3mWToSwBabnJ/g4gKbWT5VcCWstNFTtcfiVALi9B+Xiv5kC5lvf/D3gDooFEGQmY59EAAAAASUVORK5CYII=" />
                            </span>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username*" value="{{ old('username') }}" required autofocus />
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAANFJREFUSEvtld0NwiAUhU830U10EnUSdRLdRDfRTdQvoUmNtz1AQ+JDeWkJcL77C50aj66xvnIBG0k7SXwZT0nnz/zuDMwB7CVdRoSAnKYgDoDFtySA2DX9A8WjlaR18ijkOADiQCJLsfyYoIcxLxzglQ5G+7D+kazHiyoPpgAIunVbRVZgbhU1AZBUktfXvDOyX6cnfnojSh6JI4E1A8h2eDAC1IYlPLcAhuFeQmSr9n9CNKfReOm+btaoD7gieMFKuzn7qrDBLtngHpwSrXDvGzVALhkVGbnWAAAAAElFTkSuQmCC" />
                            </span>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" required />
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
