<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
        $user = Auth::user();
        //dd($user);
        //$categories = Category::all();
        $events = Event::all();
        return view('events.indexevent',['events' => $events, 'user' => $user]);
        }else{
            abort(403,'No autoritzat');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('access-admin')) {
            $categories = Category::all();
        
        return view('events.createevent', ['categories' => $categories]);
        }
        abort(403, 'Unauthorized!');
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'description'=>'required',
            'category_id'=>'required'
        ]); 
       //dd($request->all());
       //$category = Category::where('name',$request->category_id );
       //table('categories')->where('name')->value('$request->category_id');
       //Event::create($request->all());
       Event::create([
            'name'=>$request->name,
            'date'=>$request->date,
            'description'=>$request->description,
            'category_id'=>$request->category_id
       ]);
        return redirect()->route('events.index')->with('success','nueva tarea creada exitosamente');
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
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('events.editevent',['event'=>$event, 'categories' => $categories  ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'description'=>'required',
            'category_id'=>'required'
            
        ]);
        $event->update($request->all());
        return redirect()->route('events.index')->with('success','nou usuari actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect()->route('events.index')->with('success','nou event actualitzat');
    }

    public function register(Event $event,User $user)
    {
        dd($event);
    }



}
