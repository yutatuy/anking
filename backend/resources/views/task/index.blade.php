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
            <h2>タスク作成</h2>
            <form method="POST" action="{{ route('task.create') }}">
                @csrf
                <input type="text" name="name" class="border border-1 border-black">
                <button type="submit" class="bg-gray-400 rounded">送信</button>
            </form>    
        </div>
        <div class="mt-10">
            <h2>タスク一覧</h2>
            <ul class="mt-3">
                @foreach ($task_list as $task)
                    <li class="flex items-center jusify-center mt-2">
                        <div class="mr-2">ID: {{$task->getId()}} </div>
                        <div>
                            <a class="text-blue-400" href="{{ route('task.show', ['id' => $task->getId()])}}">
                                {{$task->getName()}}
                            </a>
                        </div>
                        <form method="POST" action="{{ route('task.delete', ['id' => $task->getId()])}}">
                            @csrf
                            <button class="ml-3 bg-red-400 rounded">削除</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>