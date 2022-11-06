@extends('layouts.dashboard')

@section('content')
    <div class="card card-table-border-none recent-orders" id="recent-orders">
        <div class="px-0 px-md-5 mt-5">

        </div>
        <div class="pt-0 mb-5 card-header justify-content-between">
            <h1>Users</h1>
        </div>
        <div class="card-body pt-0 pb-5">
            <table id="usersTable" class="hover row-border table card-table table-responsive table-responsive-large"
                style="width:100%">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="d-none d-lg-table-cell">Joined at</th>
                        <th class="d-none d-lg-table-cell">Total referrals</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-none d-lg-table-cell">{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                            <td>{{ $user->user_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
