<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Visitor;
use DB;
use Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = DB::select(DB::raw('SELECT 
        u1.id,
        u1.name,
        u1.email,
        u1.created_at,
        COUNT(u2.referred_by) AS user_count
        FROM users u2
        JOIN users u1
        ON u1.affiliate_id = u2.referred_by
        GROUP BY u1.id, u1.name, u1.email, u1.created_at;'));

        return view('users.index', compact('users'));
    }

    /**
     * Display a listing of users referred by a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function referredUsers()
    {
        $users = User::where('referred_by', Auth::user()->affiliate_id)->get();

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
        $totalUsers = User::where('referred_by', $affiliateId)->count();
        $totalVisitors = Visitor::where('referred_by', $affiliateId)->count();

        $users = DB::select(DB::raw("
          SELECT
          DATE_FORMAT(created_at, '%b %e') AS 'day', 
          COUNT(*) AS 'user_count'
          FROM `users`
          GROUP BY DATE_FORMAT(created_at, '%b %e');
        "));
        return view('users.stats', compact(['users', 'totalUsers', 'totalVisitors']));
    }
}
