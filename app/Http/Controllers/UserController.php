<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insert(Request $request){
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|in:male,female',
            'dob' => 'required',
            'address' => 'required|string|min:10|max:255',
        ];

        $request = request();
        $profilePicture = $request->file('image');

        $profileSaveAs = $profilePicture->getClientOriginalExtension();

        $upload_path = 'storage/avatar/';
        $profile_picture = $upload_path.$profileSaveAs;
        $success = $profilePicture->move($upload_path, $profileSaveAs);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->profilePicture = $profile_picture;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;

        $user->save();
        return redirect('/');
    }

    public function insertMember(){

        return view('admins.insert-member');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);

        $request = request();
        $profilePicture = $request->file('image');

        $profileSaveAs = $profilePicture->getClientOriginalExtension();

        $upload_path = 'storage/avatar/';
        $profile_picture = $upload_path.$profileSaveAs;
        $success = $profilePicture->move($upload_path, $profileSaveAs);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profilePicture = $profile_picture;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->save();

        return redirect('/');
    }

    public function updateProfile($id){
        $user = User::find($id);

        return view('users.update-profile', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/manage-member');
    }

    public function getAll(){
        $users = User::all();

        return view('admins.manage-member', compact('users'));
    }

    /**
     * Update User for Admin the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $user = User::find($request->id);

        $request = request();
        $profilePicture = $request->file('image');

        $profileSaveAs = $profilePicture->getClientOriginalExtension();

        $upload_path = 'storage/avatar/';
        $profile_picture = $upload_path.$profileSaveAs;
        $success = $profilePicture->move($upload_path, $profileSaveAs);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profilePicture = $profile_picture;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->save();

        return redirect('/manage-member');
    }

    public function updateUserProfile($id){
        $user = User::find($id);

        return view('admins.update-member-form', compact('user'));
    }
}
