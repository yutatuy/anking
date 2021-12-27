<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="max-w-7xl p-10">
        <div>
            <h2>タスク編集</h2>
            <form method="POST" action="{{ route('task.update', ['id' => $task->getId()]) }}" class="mt-2">
                @csrf
                <input type="text" name="name" value="{{$task->getName()}}" class="p-1 border border-1 border-black">
                <button type="submit" class="bg-gray-400 rounded">編集する</button>
            </form>    
        </div>
        <a class="text-blue-400" href="{{ route('task.index') }}">戻る</a>
    </div>
</body>
</html>