<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileInfoRequest;
use App\Models\UserProfileInfo;
use App\Models\User;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:users');
    }


    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $userId = $user->id;
        $userInfoExe = UserProfileInfo::where('user_id',$userId)->exists();
        if( $userInfoExe ){
            $user_info = UserProfileInfo::where('user_id',$userId)->first();
        }else{
            $user_info = null;
        }
        return view('user.profileInfo.profileInfo',compact('user_info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(ProfileInfoRequest $request, UserProfileInfo $userProfile)
    {

            $request->validate([
                'name' => ['required', 'max:50'],
                'kana' => ['required', 'regex:/^[ァ-ヾ]+$/u','max:50'],
                'tel' => ['required', 'max:20'],
                'postcode' => ['required', 'max:7'],
                'address' => ['required', 'max:100'],
                'gender' => ['required'],
            ]);
        $user = User::findOrFail(Auth::id());
        $userId = $user->id;
        $userInfo = UserProfileInfo::where('user_id',$userId);

        if( $userInfo->exists() ){
            // dd(true);
            $userInfo->update([
                'name' => $request->name,
                'kana' => $request->kana,
                'tel' => $request->tel,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);
        }else{
            UserProfileInfo::create([
                'name' => $request->name,
                'kana' => $request->kana,
                'user_id' => $userId,
                'tel' => $request->tel,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);
        }
        if( $request->buy === "0"){

            return Redirect::route('user.profileInfo.index')
            ->with('message','会員情報を更新しました。');
        }else{
            return Redirect::route('user.cart.checkout');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
