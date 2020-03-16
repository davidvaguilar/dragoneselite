<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Tag;
use Mail;
use App\Mail\LoginCredentials;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new User);
        //$users = User::all();
        $users = User::allowed()->get();        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $tags = Tag::all();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('admin.users.create', compact('user', 'roles', 'permissions', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);
        $data = $request->validate([
            'run' => 'required|max:15|unique:users',
            'name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'adress' => 'nullable',
            'phone' => 'nullable',
            'movil' => 'nullable'
        ]);
        $data['password'] = str_random(8);

        $user = User::create($data);

        $user->syncTags($request->get('tags'));

        if ($request->filled('roles')){
            $user->assignRole($request->roles);
        }
        if ($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        //ENVIAR EMAIL EnviarCorreoConCredenciales
        //UserWasCreated::dispatch($user, $data['password']); DESDE MAILSHIP
        /* FIN ENVIO CORREO*/
        Mail::to($user->email)->send(new LoginCredentials($user, $data['password']));

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        //$roles = Role::pluck('name','id');
        $roles = Role::with('permissions')->get();
        $tags = Tag::all();
        //dd($user->tags->pluck('id'));
        $permissions = Permission::pluck('name','id');
        return view('admin.users.edit', compact('user', 'roles', 'permissions', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        /*$rules = [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
        ];

        if($request->filled('password')){
            $rules['password'] = ['confirmed', 'min:6'];
        }*/

        //$data = $request->validate($rules);
        //dd($request->all());
        $data = $request->validated();
        //dd($data);
        $user->update($data);
        $user->syncTags($request->get('tags'));
        return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.users.index')->withFlash('Usuario eliminado');
    }
}
