<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to the task</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin: 0 auto;
            font-family: 'Lato', sans-serif;
            text-align: center;
            color: #999;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
            width: 100%;
        }

        .instructions {
            position: relative;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            padding: 5px 10%;
        }

        a, a:visited {
            text-decoration: none;
            color: #999;
        }

        h1 {
            font-size: 32px;
            margin: 16px 0 0 0;
        }
    </style>
</head>

<body>
<div class="instructions">

    <img src="/images/logo.png" alt="Logo" title="logo">

    <h1>Welcome to the export challenge.</h1>

    <p>What we have here is an incomplete export system based on a small set of student data. </p>

    <p>The mission, if you choose to accept it, is to fill in the missing parts and finish the application to the best
        of your ability.</p>

    <p>How you do this is completely down to you and we have only provided the bare bones.</p>

    <p>There is no right or wrong however we would prefer you didn't rely on third party packages, don't be afraid to
        impress us.</p>

    <p>Although this is a relatively small task we believe there is enough here for you to be able to demonstrate your
        ability to follow best practices and show your understanding of the Laravel framework.</p>

    <p>Oh and there may be some 'deliberate' errors in the code... Enjoy.</p>

    <p><a href="{{url('index')}}" title="task">Click here to continue to the challenge</a></p>

</div>
</body>

</html>
