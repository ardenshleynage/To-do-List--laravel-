<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TodoModel;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function homepage()
    {
        return view('homepage');
    }
    public function alertmessage($id)
    {
        $task = TodoModel::find($id);

        if ($task) {
            // Envoyer les données à la vue
            return view('alert', compact('task'));
        }

        // Gérer le cas où la tâche n'existe pas
        return redirect()->back()->with('error', 'Task not found');
    }
    public function allTasks()
    {
        $currentDateTime = Carbon::now('America/New_York');

        $currentDate = $currentDateTime->format('d F, l Y');
        $currentTime = $currentDateTime->format('h:i A');
        $tasks = TodoModel::all();
        return view('priority.all', compact('currentDate', 'currentTime', 'tasks'));
    }
    public function lowTasks()
    {
        $currentDateTime = Carbon::now('America/New_York');

        $currentDate = $currentDateTime->format('d F, l Y');
        $currentTime = $currentDateTime->format('h:i A');


        $tasks = TodoModel::where('priority', 1)->get();

        return view('priority.low', compact('currentDate', 'currentTime', 'tasks'));
    }
    public function midTasks()
    {
        $currentDateTime = Carbon::now('America/New_York');

        $currentDate = $currentDateTime->format('d F, l Y');
        $currentTime = $currentDateTime->format('h:i A');


        $tasks = TodoModel::where('priority', 2)->get();

        return view('priority.mid', compact('currentDate', 'currentTime', 'tasks'));
    }
    public function menu()
    {
        return view('menu');
    }

    public function highTasks()
    {
        $currentDateTime = Carbon::now('America/New_York');

        $currentDate = $currentDateTime->format('d F, l Y');
        $currentTime = $currentDateTime->format('h:i A');


        $tasks = TodoModel::where('priority', 3)->get();

        return view('priority.high', compact('currentDate', 'currentTime', 'tasks'));
    }
    public function add()
    {
        return view('actions.add');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => '|string|max:255',
            'priority' => 'required|integer',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le titre doit ètre une chaine de caractères.',
            'title.max' => 'Le titre doit contenir moins de 255 caractères.',
            'description.string' => 'La description doit ètre une chaine de caractères.',
            'description.max' => 'La description doit contenir moins de 255 caractères.',
            'priority.required' => 'La priorité est obligatoire.',
            'priority.integer' => 'La priorité doit ètre un entier.',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $priority = $request->input('priority');

        try {
            TodoModel::create([
                'title' => $title,
                'description' => $description,
                'priority' => $priority,
            ]);

            return redirect()->route('allTasks');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $task = TodoModel::find($id);

        if ($task) {
            // Envoyer les données à la vue
            return view('actions.update', compact('task'));
        }

        // Gérer le cas où la tâche n'existe pas
        return redirect()->back()->with('error', 'Task not found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:255',  // Retirer le pipe supplémentaire
            'priority' => 'required|integer',
        ], [
            'title.required' => 'Le champ titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre doit contenir moins de 255 caractères.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description doit contenir moins de 255 caractères.',
            'priority.required' => 'La priorité est obligatoire.',
            'priority.integer' => 'La priorité doit être un entier.',
        ]);

        try {
            // Trouver la tâche par son id
            $task = TodoModel::findOrFail($id);

            // Si la tâche existe, on la met à jour
            if ($task) {
                $task->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'priority' => $request->input('priority'),
                ]);
                // Rediriger avec un message de succès
                return redirect()->route('allTasks');
            }

            // Si la tâche n'existe pas, retourner une erreur
            return redirect()->back()->with('error', 'Task not found');
        } catch (\Exception $e) {
            // Retourner une erreur si une exception est levée
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Trouver la tâche par son id
        $task = TodoModel::find($id);

        if ($task) {
            // Supprimer la tâche
            $task->delete();
            return redirect()->route('allTasks');
        }

        return redirect()->route('allTasks')->with('error', 'Task not found');
    }
}
