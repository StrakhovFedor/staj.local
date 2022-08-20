<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить задачу') }}
        </h2>
    </x-slot>
    <style>
        .submit{
            border:1px solid black;
            color: white;
            background: grey;
            padding:10px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row flex_block">
                <form action="{{ route('add.task.bd') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 task_add">
                            <label for="task_title">Ввести заголовок задачи</label>
                            <br>
                            <input type="text" name="task_title" style="margin-bottom: 10px">
                            <br>
                            <label for="task_title">Опишите задачу</label>
                            <br>
                            <input type="text" name="task" style="margin-bottom: 10px">
                            <br>
                            <input class="submit" type="submit" value="Добавить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
