<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:قائمة المستخدمين', ['only' => ['index','store','show']]);
         $this->middleware('permission:اضافة مستخدم', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف مستخدم', ['only' => ['destroy']]);
    }

 
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.show_users', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.Add_user', compact('roles'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role_name' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role_name'));

        return redirect()->route('users.index')
            ->with('success', 'تم إنشاء المستخدم بنجاح');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'role_name' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);
        $user->update($input);

        if ($request->has('role_name')) {
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('role_name'));
        }

        return redirect()->route('users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح');
    }


    public function destroy(Request $request)
    {
        $id = $request->user_id;
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->back()
                ->with('error', 'لم يتم العثور على المستخدم');
        }

        $user->delete();

        return redirect('/users')
            ->with('delete', 'تم حذف المستخدم بنجاح');
    }
}
