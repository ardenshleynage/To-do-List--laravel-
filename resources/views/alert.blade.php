<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app3.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
    <title>Request Delete</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <h3>Delete</h3>
            <p>Are you sure you want to delete the following task?</p>
            <ul>
                <li><strong>Title:</strong> {{ $task->title }}</li>
                <li><strong>Description:</strong> {{ $task->description }}</li>
                <li><strong>Priority:</strong>
                    {{ $task->priority == 1 ? 'Low' : ($task->priority == 2 ? 'Mid' : 'High') }}</li>
                <li><strong>Date:</strong> {{ $task->updated_at->format('Y-m-d') }}</li>
            </ul>
            <div class="warn_info">
                <h4><i class="fa fa-warning"></i> Warning</h4>
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>

            <div class="clearfix">
                <a class="btn1" id="cancel" href="{{ url()->previous() }}">Cancel</a>
                <form action="{{ route('tasks.destroy', $task->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn2" id="cancel" type="submit">Confirm Delete <i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    <script></script>
</body>

</html>
