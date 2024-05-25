<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blocked Page</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Montserrat', 'Calistoga', 'Roboto', 'Tahoma';
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .content {
            text-align: center;
        }

        h1 {
            font-size: 150px;
            text-shadow: -8px 0 0 grey;
            color: red;
        }

        p:nth-child(3) {
            margin-bottom: 10px;
        }

        a {
            color: red;
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <p class="lead">OOPS! YOUR PAGE IS BLOCKED</p>
            <h1>403</h1>
            <p>YOUR REQUEST PAGE IS DENIED</p>
            <a href="/dashboard">BACK TO DASHBOARD</a>
        </div>
    </div>
</body>

</html>
