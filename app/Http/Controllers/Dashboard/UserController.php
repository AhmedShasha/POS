<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');

        

    }

    public function index(Request $request)
    {
        // professional way to search

        $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($q) use ($request){

                return $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });
        })->latest()->paginate(3);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        $taps = ['users', 'categories', 'products']; // For DRY (Don't Rebeat Yourself)
        $cruds = ['create', 'read', 'update', 'delete'];

        return view('dashboard.users.create', compact('users', 'taps', 'cruds'));
    }

    public function store(Request $request)
    {
        $request->validate([ // Validate form
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'image',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except('password', 'password_confirmation', 'permissions', 'image'); // expect password from request
        $request_data['password'] = bcrypt($request->password); //create a new field for password to bcrypt

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/' . $request->image->hashName())); // hashName() Making hash on names to be Unique

            $request_data['image'] = $request->image->hashName();

        }

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        toast()->success(Lang::get('site.added_successfully'));

        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        //
        $users = User::find($id);
        $taps = ['users', 'categories', 'products']; // For DRY (Don't Rebeat Yourself)
        $cruds = ['create', 'read', 'update', 'delete'];

        return view('dashboard.users.edit', compact('users', 'taps', 'cruds'));
    }

    public function update(Request $request, User $user)
    {
        //
        $request->validate(([ // Validate form
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'permissions' => 'required|min:1',
            'image' => 'image',

        ]));

        // $user = User::find($id);

        $request_data = $request->except(['permissions', 'image']);
        if ($request->image) {
            if ($user->image != 'default.png') {

                File::delete('uploads/users_images/' . $user->image);

            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/' . $request->image->hashName())); // hashName() Making hash on names to be Unique

            $request_data['image'] = $request->image->hashName();

        }

        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        if($request){
            toast()->success(Lang::get('site.updated_successfully'));
        }
        return redirect()->route('dashboard.users.index');

    }

    public function destroy($id)
    {
        //
        $user = User::find($id);

        if ($user->image !== 'default.png') {
            File::delete('uploads/users_images/' . $user->image);
        }

        $user->delete();

        toast()->success(Lang::get('site.deleted_successfully'));

        return redirect()->route('dashboard.users.index');

    }
}
