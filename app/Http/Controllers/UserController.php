<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUsers;
use App\Role;
use Hash;   
class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();


        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::pluck('display_name','id');
        $userRole = null;
        return view('admin.users.create',compact('roles','userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request) {

        $array = $request->all();

        $array['password'] = bcrypt($array['password']);
        unset($array['password_confirmation']);
        unset($array['_token']);
                $user = User::create($array);

         foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('admin.users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::whereId($id)->first();
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user_edit = User::whereId($id)->first();
         $roles = Role::pluck('display_name','id');
        $userRole = $user_edit->roles->pluck('id','id')->toArray();
        if (empty($user_edit)) {
            Flash::error('User not found');

            return redirect()->route('admin.users.index');
        }

        return view('admin.users.edit',compact('user_edit','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $user = User::whereId($id)->first();
        if (empty($user)) {

            return redirect(route('admin.users.index'));
        }
        $array = $request->all();
        if(!empty($input['password'])){ 
            $array['password'] = bcrypt($array['password']);
        }else{
            $array = array_except($array,array('password'));    
        }
        unset($array['password_confirmation']);
        unset($array['_token']);
        unset($array['_method']);
        $user->update($array);
         DB::table('role_user')->where('user_id',$id)->delete();
         foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('admin.users.index')->with('success','User created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        if (empty($user)) {
            return redirect(route('admin.users.index'));
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted successfully');
    }

    public function search(Request $request) {
        $post = $request->all();
        $query = DB::table('users')->where([
                    ['name', 'like', '%' . $post['name'] . '%'],
                    ['email', 'like', '%' . $post['email'] . '%']
                ])->get();
        return view('admin.users.table', ['users' => $query]);
    }

}
