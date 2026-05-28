<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(fn($q) =>
                $q->where('nombres',  'like', "%$s%")
                  ->orWhere('apellidos','like', "%$s%")
                  ->orWhere('username', 'like', "%$s%")
                  ->orWhere('correo',   'like', "%$s%")
                  ->orWhere('ci',       'like', "%$s%")
            );
        }
        $users  = $query->latest()->get();
        $totals = [
            'total'  => User::count(),
            'admins' => User::where('rol','admin')->count(),
            'users'  => User::where('rol','user')->count(),
        ];
        return view('admin.dashboard', compact('users', 'totals'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres'          => 'required|string|max:100',
            'apellidos'        => 'required|string|max:100',
            'username'         => 'required|string|unique:users,username|max:50',
            'correo'           => 'required|email|unique:users,correo',
            'password'         => 'required|string|min:4',
            'ci'               => 'nullable|string|max:20',
            'telefono'         => 'nullable|string|max:20',
            'ciudad'           => 'nullable|string|max:60',
            'fecha_nacimiento' => 'nullable|date',
            'rol'              => 'required|in:admin,user',
        ]);

        User::create([
            'nombres'          => $request->nombres,
            'apellidos'        => $request->apellidos,
            'username'         => $request->username,
            'correo'           => $request->correo,
            'password'         => Hash::make($request->password),
            'ci'               => $request->ci,
            'telefono'         => $request->telefono,
            'ciudad'           => $request->ciudad,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol'              => $request->rol,
            'fecha_creacion'   => now(),
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'nombres'          => 'required|string|max:100',
            'apellidos'        => 'required|string|max:100',
            'username'         => 'required|string|unique:users,username,'.$id.'|max:50',
            'correo'           => 'required|email|unique:users,correo,'.$id,
            'ci'               => 'nullable|string|max:20',
            'telefono'         => 'nullable|string|max:20',
            'ciudad'           => 'nullable|string|max:60',
            'fecha_nacimiento' => 'nullable|date',
            'rol'              => 'required|in:admin,user',
        ]);

        $data = $request->only(
            'nombres','apellidos','username','correo',
            'ci','telefono','ciudad','fecha_nacimiento','rol'
        );
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.dashboard')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'No puedes eliminar tu propia cuenta.');
        }
        $user->delete();
        return redirect()->route('admin.dashboard')
            ->with('success', 'Usuario eliminado.');
    }
}