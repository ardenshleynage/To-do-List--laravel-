<button class="button-1" role="button">Back</button>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    @vite(['resources/css/app.css','resources/css/app4.css'])
    <style>
        .textarea-container {
            position: relative;
            margin-bottom: 20px;
        }

        textarea {
            color: #aaa;
            padding: 15px 10px;
            background-color: #333;
            border: none;
            width: 100%;
            font-size: 16px;
            transition: all 0.5s;
        }


        .textarea-container label {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #aaa;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.5s;
        }

        textarea:focus+label,
        textarea:not(:placeholder-shown)+label {
            transform: translateY(-10px);
            font-size: 12px;
            color: #fff;
        }
    </style>
</head>

<body>
    <section>
        <div class="signin">
            <div class="content">
                <h2>Edit</h2>
                <form action="{{ route('tasks.update',$task->id) }}" method="post" class="form">
                    @csrf
                    @method('PUT')
                    <div class="inputBox">
                        <input type="text" name="title" value="{{ old('title', $task->title) }}">
                        <i>Title</i>
                        @error('title')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="inputBox textarea-container">
                        <textarea name="description" id="description" cols="30" rows="10"
                            placeholder=" ">{{ old('description', $task->description) }}</textarea>
                        <label for="description">Description...</label>
                        @error('description')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="inputBox">
                        <label style="color: #aaa;" for="priority">Priority :</label>
                        <select style="width: 70%;color: #aaa;padding: 15px 10px;background-color: #333;border: none;"
                            id="priority" name="priority">
                            <option style="color: #aaa;" value="1"
                                {{ old('priority', $task->priority) == 1 ? 'selected' : '' }}>Low</option>
                            <option style="color: #aaa;" value="2"
                                {{ old('priority', $task->priority) == 2 ? 'selected' : '' }}>Mid</option>
                            <option style="color: #aaa;" value="3"
                                {{ old('priority', $task->priority) == 3 ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="inputBox">
                        <input type="submit" value="Add">
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>
