@include('menu')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.scss', 'resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.min.js'])
    <title>Accueil</title>
</head>

<body>
    <h2>Todo App</h2>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <div class="content">

        <!-- card -->
        <div class="card">
            <a href="/all">
                <div class="icon"><i class="material-icons md-36">all_inbox</i></div>
                <p class="title">All</p>
                <p class="text">Click to see or edit all your tasks.</p>
            </a>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card">
            <a href="/low">
                <div class="icon"><i class="material-icons md-36">low_priority</i></div>
                <p class="title">Low Priority</p>
                <p class="text">Click to see or edit your low-priority tasks.</p>
            </a>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card">
            <a href="/mid">
                <div class="icon"><i class="material-icons md-36">trip_origin</i></div>
                <p class="title">Normal Priority</p>
                <p class="text">Click to see or edit your normal-priority tasks.</p>
            </a>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="card">
            <a href="/high">
                <div class="icon"><i class="material-icons md-36">priority_high</i></div>
                <p class="title">High Priority</p>
                <p class="text">Click to see or edit your high-priority tasks.</p>
            </a>
        </div>
        <!-- end card -->

    </div>
    </div>
    <div class="button-container">
        <a href="/add"><button class="button">Add</button></a>
      </div>




</body>

</html>
