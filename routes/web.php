<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Make task class
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public bool $completed,
        public string $createdAt,
        public string $updatedAt,
    ) {

    }
}

// Generate some task
$tasks = [
    new Task(
        1,
        'First Task',
        'This is a first task',
        false,
        '2023-09-10 10:00:00',
        '2023-09-10 10:00:00'
    ),
    new Task(
        2,
        'Second Task',
        'This is a second task',
        false,
        '2023-09-10 10:00:00',
        '2023-09-10 10:00:00'
    ),
    new Task(
        3,
        'Third Task',
        'This is a third task',
        false,
        '2023-09-10 10:00:00',
        '2023-09-10 10:00:00'
    ),
    new Task(
        4,
        'Fourth Task',
        'This is a fourth task',
        false,
        '2023-09-10 10:00:00',
        '2023-09-10 10:00:00'
    ),
];

// Redirect if someone access the root endpoint
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::fallback(function () {
    return 'Where are you going to?';
});