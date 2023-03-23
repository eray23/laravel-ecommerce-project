<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->returnUrl = "/users/{}/addresses";
    }

    public function index(User $user)
    {
        $addrs = $user->addrs();
        return view("backend.addresses.index", ["addrs" => $addrs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view("backend.addresses.insert_form", ["user"=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, AddressRequest $request)
    {
        $addr = new Address();
        $data = $this->prepare($request, $user->getFillable());
        $addr->fill($data);
        $addr->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Address $address)
    {
        return view("backend.addresses.update_form", ["user"=>$user, "addr"=>$address]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, User $user, Address $address)
    {
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);
        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(["message"=>"Done", "id" =>$address->address_id]);
    }

    private function editReturnUrl($id){
        $this->returnUrl = "/users/$id/addresses";
    }
}
