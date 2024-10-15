@include('menu')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>High</title>
    @vite(['resources/css/app2.css'])
    <style>
        .task-header {
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        .task-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        .center_content {
            position: relative;
            display: flex;
            width: 100%;
            height: 40px;
            background-color: #fff;
            border-radius: 4px;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }

        .center_content2 {
            flex: 1;
            text-align: center;
        }

        .strike_none {
            text-decoration: none;
        }

        .task-number {
            font-weight: bold;
            margin-right: 10px;
        }

        .no-tasks {
            text-align: center;
            font-size: 18px;
            padding: 20px;
            color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="inner_card">
                <h4 class="setdate">{{ $currentDate }}</h4>
                <h5 class="settime">{{ $currentTime }}</h5>
            </div>

            <ul class="list">
                <!-- Vérifier si la liste des tâches est vide -->
                @if ($tasks->isEmpty())
                    <!-- Message si aucune tâche n'existe -->
                    <li>
                        <div class="no-tasks">No tasks for high level</div>
                    </li>
                @else
                    <!-- Header Row -->
                    <li>
                        <div class="center_content task-header">
                            <div class="center_content2">Title</div>
                            <div class="center_content2">Description</div>
                            <div class="center_content2">Priority</div>
                            <div class="center_content2">Date</div>
                            <div class="center_content2">Actions</div>
                        </div>
                    </li>

                    <!-- Task Rows avec numérotation -->
                    @foreach ($tasks as $index => $task)
                        <li>
                            <div class="center_content task-row">
                                <!-- Task Number -->
                                <div class="task-number">{{ $index + 1 }}.</div>

                                <!-- Task Title -->
                                <div class="center_content2">
                                    <small class="check{{ $task->id }}"
                                        onclick="checked({{ $task->id }})"></small>
                                    <strike id="strike{{ $task->id }}"
                                        class="strike_none">{{ $task->title }}</strike>
                                </div>

                                <!-- Task Description -->
                                <div class="center_content2">
                                    <small class="check{{ $task->id }}"
                                        onclick="checked({{ $task->id }})"></small>
                                    <strike id="strike{{ $task->id }}"
                                        class="strike_none">{{ $task->description }}</strike>
                                </div>

                                <!-- Task Priority -->
                                <div class="center_content2">
                                    <small class="check{{ $task->id }}"
                                        onclick="checked({{ $task->id }})"></small>
                                    <strike id="strike{{ $task->id }}" class="strike_none">
                                        {{ $task->priority == 1 ? 'low' : ($task->priority == 2 ? 'mid' : 'high') }}
                                    </strike>
                                </div>

                                <!-- Task Date -->
                                <div class="center_content2">
                                    <span>{{ $task->updated_at->format('Y-m-d') }}</span>
                                </div>
                                <div class="center_content2">
                                    <a href="{{ route('alert', $task->id) }}"><button type="submit"
                                            class="button">Delete</button></a>
                                    <a href="{{ route('tasks.edit', $task->id) }}"><button type="submit"
                                            class="button">Edit</button></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

            <div class="add">
                <span><i class="fa fa-plus"><a href="/add"><img src="{{ asset('images/add.png') }}" height="100%"
                                width="100%" alt=""></a></i></span>
            </div>
        </div>
    </div>
</body>

</html>
