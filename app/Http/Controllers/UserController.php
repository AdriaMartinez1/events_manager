<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('access-admin')) {
        $users = User::all();
        return view('users.indexuser', ['users' => $users]);
        }
        abort(403, 'Unauthorized!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
            //'is_admin'=>'required'
        ]);
        
        //$request->is_admin = $request->has('is_admin') ? true : false;
        //User::create($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, 
            'is_admin' => $request->has('is_admin') ? true : false,  
        ];
    
        User::create($data);
        return redirect()->route('users.index')->with('success','nou usuari creat');
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
    public function edit(User $user)
    {
        return view('users.edituser',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            //'is_admin'=>'required'
            
        ]);
        $user->is_admin = $request->has('is_admin') ? true : false;
        $user->update($request->all());
        return redirect()->route('users.index')->with('success','nou usuari actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','nou usuari eliminat exitosamente');
    }
}
