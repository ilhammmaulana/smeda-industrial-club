<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Domain Not Registered</title>
        <!-- Link CSS Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Link CSS Metronic -->
        <link
            href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/plugins/global/plugins.bundle.css"
            rel="stylesheet" type="text/css" />
        <link
            href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/css/style.bundle.css"
            rel="stylesheet" type="text/css" />
        <style>
            /* Custom styling for the waiting page */
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f7f8fa;
            }
        </style>
    </head>

    <body>
        <div class="container text-center">
            <h1 class="display-4 text-dark">
                Your domain is not yet registered
            </h1>
            <p class="lead text-muted">
                Thank you for visiting. Currently, your domain is not registered in our system. Please contact our admin
                team to confirm and complete your registration.
            </p>
            <p class="lead text-muted">
                If you need further assistance, feel free to reach out to us.
            </p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Link JS Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Link JS Metronic -->
        <script
            src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/plugins/global/plugins.bundle.js">
        </script>
        <script
            src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/js/scripts.bundle.js">
        </script>
    </body>

</html>