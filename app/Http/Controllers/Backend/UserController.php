<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/users";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("backend.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $password = $request->get("password");
        $is_admin = $request->get("is_admin", 0);
        $is_active = $request->get("is_active", 0);


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();
        Alert::success('Kullanıcı Eklendi', 'Kullanıcı başarıyla eklendi.');


        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("backend.users.update_form", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $is_admin = $request->get("is_admin", 0);
        $is_active = $request->get("is_active", 0);


        $user->name = $name;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;


        $user->save();
        Alert::success('Kullanıcı Güncellendi', 'Kullanıcı bilgileri başarıyla güncellendi.');
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Kullanıcı Silindi', 'Kullanıcı Başarıyla silindi');
        return Redirect::to($this->returnUrl);

    }
    /**
     * Show the form for changing password.
     */
    public function passwordForm(User $user){

        return view("backend.users.password_form", ["user"=>$user]);
    }
    public function changePassword(User $user, UserRequest $request){
        $password = $request->get("password");
        $user->password = Hash::make($password);
        $user->save();
        Alert::html("Şifre Güncellendi", "{{$user->name}}", "success");
        return Redirect::to($this->returnUrl);
    }
}
