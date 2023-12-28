<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserProfileInfo;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = UserProfileInfo::with('user')->withTrashed();

        $users = $users->where('user_profile_infos.kana','like','%'.$request->keyword.'%')
        ->orWhere('user_profile_infos.tel','like','%'.$request->keyword.'%')->paginate(50);

        return view('admin.userlist.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = User::withTrashed()->where('id','=',$id);
        $user = UserProfileInfo::withTrashed()
        ->joinSub($userId, 'users', function ($join) {
            $join->on('User_Profile_infos.user_id','=','users.id');
        })
        ->get();
        
        return view('admin.userlist.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
