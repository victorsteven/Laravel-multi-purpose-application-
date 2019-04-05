<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('isAdmin');
        if (Gate::allows('isAdmin') || Gate::allows('isAuthor')) {
            return User::latest()->paginate(5);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all(); //This will show in network tab
        // logger($request->all()); //This will show in the log file
        // return ['message' => 'This is the message'];

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'bio' => $request['bio'],
            // 'photo' => $request['photo'],

            'password' => \Hash::make($request['password'])
        ]);

        // return $user;
        if ($user) {
            return $user;
        } else {
            return ['message' => 'user could not be created'];
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    *
    */
    public function updateProfile(Request $request)
    {
        //because we are using api we can do:
        // return auth()->user();
        //we rather do:
        $user = auth('api')->user();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6'
        ]);

        $currentPhoto = $user->photo;

        if ($request->photo != $currentPhoto) {
            $name = time() . '.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            \Image::make($request->photo)->save(public_path('img/profile/') . $name);

            //dont do, because it will throw the error:
            //String data, right truncated: 1406 Data too long for column 'photo' at row 1
            // $request->photo = $name;
            //we rather do:
            $request->merge(['photo' => $name]);

            //IF THE USER UPLOAD A NEW PHOTO, REMOVE THE OLD ONE
            //we get the path of the user photo
            $userPhoto = public_path('/img/profile/' . $currentPhoto);
            //if this file exists, remove it from the folder.
            if (file_exists($userPhoto)) {
                unlink($userPhoto);
            }
        }

        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        // return ['message' => 'success'];
        // return $request->photo;
        $user->update($request->all());
        return  ['message' => 'success'];
    }

    public function profile()
    {
        //because we are using api we can do:
        // return auth()->user();
        //we rather do:
        return auth('api')->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return ['message' => 'updated user'];
        // return $id;

        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string',
            //for this user, if he gives a new email change the old one, else, still leave the one there
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6'
        ]);

        $user->update($request->all());

        return ['message' => 'updated the user'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
        } else {
            return;
        }

        return ['message' => 'user deleted'];
    }

    public function search()
    {
        if ($search = \Request::get('q')) {
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('type', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $users = User::latest()->paginate(5);
        }

        return $users;
    }
}
