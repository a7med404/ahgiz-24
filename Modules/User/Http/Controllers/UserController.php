<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use \Hash;
use \Session;
use Modules\User\Entities\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
    //   $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(User $user)
    {
        $roles = Role::all();
        $allUsers = $user->all(); 
        return view('user::users.index', ['users' => $allUsers, 'roles' => $roles]);
    }


    public function userDataTables()
    {
        return DataTables::of(User::orderBy('id', 'desc')->get())
            ->addColumn('options', function ($user) {
                return view('user::users.colums.options', ['id' => $user->id, 'routeName' => 'users']);
            })
            ->addColumn('last_login', function (User $user) {
                if($user->last_login != null) {
                    return \Carbon\Carbon::parse($user->last_login)->diffForhumans();
                }
                return $user->last_login;
            })

            ->addColumn('roles', function ($user) {
                // $data = [];
                // foreach ($user->roles as $role) {
                    return view('user::users.colums.role', ['roles' => $user->roles]);
                    // $data[] = '<span class="label label-light-info">'.$role->display_name.'</span>';
                // }
                // return $data;
            })
            ->editColumn('status', function ($user) {
                return $user->status == 0 ? '<span class="label label-light-warning">' . status()[$user->status] . '</span>' : '<span class="label label-light-success">' . status()[$user->status] . '</span>';
            })
            ->rawColumns(['last_login', 'roles', 'options', 'status'])
            // ->removeColumn('password')
            // ->setRowClass('{{ $status == 0 ? "alert alert-success" : "alert alert-warning" }}')
            ->setRowId('{{$id}}')
            ->make(true);
        
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user::users.add', ['roles' => $roles]);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, User $user)
    {
        // dd($request->all());
        $newUser = $user::create([
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email, 
            'username'      => $request->username,
            'status'        => $request->status,
            'note'          => $request->note,
            'last_login'    => now(),
            'password'      => Hash::make($request->password),
        ]);
        if ($newUser) {
            $request->roles != null ? $newUser->attachRoles($request->roles) : $newUser->attachRole('user');
          }
        Session::flash('flash_massage_type');
        return redirect('adminCpanel/users')->withFlashMassage('User Added Susscefully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    { 
        $userInfo = User::findOrFail($id);
        return view('user::users.show', ['userInfo' => $userInfo]);
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id, User $users)
    {
        $roles = Role::all();
        $userInfo = $users->findOrfail($id);
        return view('user::users.edit',['userInfo' => $userInfo, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($id, Request $request, User $Oneuser)
    {
        $userUpdate = $Oneuser->findOrFail($id);
        $data = [
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'username'      => $request->username,
            'status'        => $request->status,
            'note'          => $request->note,
        ];
        $userUpdate->fill($data)->save();
        if ($userUpdate) {
          $userUpdate->syncRoles($request->roles);
        }
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('User Updated Susscefully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id, User $Oneuser)
    {
        $cruentUser = \Auth::user()->id;
        $userForDelete = $Oneuser->findOrfail($id);
        if ($id == 1 Or $id == $cruentUser) {
            return redirect()->back()->withFlashMassage('You Can\'t Delete This User');
        }
        $userForDelete->delete();
        Session::flash('flash_massage_type');
        return redirect()->back()->withFlashMassage('User Deleted Susscefully');
    }

    public function changePassword($id, User $Oneuser)
    {
        $userInfo = $Oneuser->findOrfail($id);
        return view('user::users.change-password', ['userInfo' => $userInfo]);
    }
    
    public function updatePassword($id, User $Oneuser, Request $request)
    {
        $userUpdate = $Oneuser->findOrfail($id);
        $authUser = auth()->user();
        if($request->has('old_password')){
            $adminPassword = $authUser->password;
            $oldPassword  = $request->old_password;
            if (Hash::check($oldPassword, $adminPassword)) {
                $authUser->password = Hash::make($request->password);
                $authUser->save();
                Session::flash('flash_massage_type');
                return redirect()->back()->withFlashMassage('Password Updated Susscefully');
            }else {
                Session::flash('flash_massage_type', 4);
                return redirect()->back()->withFlashMassage('Password Not Right');
            }
        }elseif ($request->has('password')) {
            $userUpdate->password = Hash::make($request->password);
            $userUpdate->save();
            Session::flash('flash_massage_type');
            return redirect()->back()->withFlashMassage('User Password Updated Susscefully');
        }
    }



    public function changeMyPassword($id, User $Oneuser)
    {
        $userInfo = $Oneuser->findOrfail($id);
        return view('user::users.change-my-password', ['userInfo' => $userInfo]);
    }

    
}
