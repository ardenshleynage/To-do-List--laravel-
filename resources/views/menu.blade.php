<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app4.css'])
</head>

<body>
    <!--    Made by Erik Terwan    -->
    <!--   24th of November 2015   -->
    <!--        MIT License        -->
    <nav role="navigation">
        <div id="menuToggle">
            <!--
      A fake / hidden checkbox is used as click reciever,
      so you can use the :checked selector on it.
      -->
            <input type="checkbox" />

            <!--
      Some spans to act as a hamburger.

      They are acting like a real hamburger,
      not that McDonalds stuff.
      -->
            <span></span>
            <span></span>
            <span></span>

            <!--
      Too bad the menu has to be inside of the button
      but hey, it's pure CSS magic.
      -->
            <ul id="menu">
                <a href="/main">
                    <li>Home</li>
                </a>
                <a href="/all">
                    <li>All tasks</li>
                </a>
                <a href="/low">
                    <li>Low tasks</li>
                </a>
                <a href="/mid">
                    <li>Mid tasks</li>
                </a>
                <a href="/high">
                    <li>High tasks</li>
                </a>

            </ul>
        </div>
    </nav>
</body>

</html>
