<a href="{{ url()->previous() }}"><button class="button-1" role="button">Back</button></a>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add</title>
    @vite(['resources/css/app.css', 'resources/css/app4.css'])
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
    @include('menu')

    <section>

        <div class="arrow"></div>
        <div class="signin">
            <div class="content">
                <h2>Add</h2>
                <form action="{{ route('tasks.store') }}" method="post" class="form">
                    @csrf
                    @method('POST')
                    <div class="inputBox">
                        <input type="text" name="title" value="{{ old('title') }}">
                        <i>Title</i>
                        @error('title')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="inputBox textarea-container">
                        <textarea name="description" id="description" value="{{ old('description') }}" cols="30" rows="10"
                            placeholder=" "></textarea>
                        <label for="description">Description...</label>
                        @error('description')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="inputBox">
                        <label style="color: #aaa;" for="priority"> Priority :</label>
                        <select style="width: 70%;color: #aaa;padding: 15px 10px;background-color: #333;border: none;"
                            id="priority" value="{{ old('priority') }}" name="priority">
                            <option style="color: #aaa;" value="1">Low</option>
                            <option style="color: #aaa;" value="2">Mid</option>
                            <option style="color: #aaa;" value="3">High</option>
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
