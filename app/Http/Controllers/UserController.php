<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        // dd($users);

        return view('users.index', compact('users'));
    }

    /**
     * Display a listing of users referred by a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function referredUsers()
    {
        $users = User::where('referred_by', Auth::user()->affiliate_id)->paginate(10);

        return view('users.referred', compact('users'));
    }

    /**
     * Display a listing of statistics for a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats()
    {
        $affiliateId = Auth::user()->affiliate_id;
        $totalUsers = User::where('referred_by', $affiliateId);
        $totalVisitors = Visitor::where('referred_by', $affiliateId);
        

        return view('users.stats', compact('stats'));
    }
}
