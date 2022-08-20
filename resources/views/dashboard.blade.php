<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список задач') }}
        </h2>
    </x-slot>
    <style>
        .tasks{
            padding: 15px 10px;
            margin: 10px;
            border-radius: 10px;
            overflow: hidden;
        }
        .flex_block{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row flex_block">
                @if($tasks === [])
                    <p>Нет записей</p>
                @endif
                @foreach($tasks as $task)
                    <div class="col-md-4 tasks" style="border: 1px solid black">
                        <form action="{{ route('delete.task') }}" method="POST">
                            {{ csrf_field() }}
                            <h1 class="title_tasks" style="font-weight: bold">{{$task['task_title']}}</h1>
                            <p>{{$task['task']}}</p>
                            <input type="hidden" name="task_id" value="{{$task['id']}}">
                            <input type="submit" value="Удалить">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

