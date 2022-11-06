@extends('layouts.dashboard')

@section('content')
    <div class="card card-table-border-none recent-orders" id="recent-orders">
        <div class="px-0 px-md-5 mt-5">

        </div>
        <div class="pt-0 mb-5 card-header justify-content-between">
            <h1>Statistics</h1>
        </div>
        <div class="card-body pt-0 pb-5">
          @foreach($users as $user)
            <div class="day d-none">{{ $user->day }}</div>
            <div class="user-count d-none">{{ $user->user_count }}</div>
          @endforeach
          <div class="row mt-5">
            <div class="col-12 mb-5">
              <div class="h5">Referral link:</div>
              <span class="h5">
                {{ url('/register') . '/?ref=' . Auth::user()->affiliate_id }}
              </span>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="media widget-media p-4 bg-white border">

      
                  <div class="media-body align-self-center">
                    <div class="text-primary text-center h2 mb-2">{{ $totalUsers }}</div>
                    <p class="text-center">Referred users</p>
                  </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-2">
              <div class="media widget-media p-4 bg-white border">

    
                <div class="media-body align-self-center">
                  <div class="text-primary text-center h2 mb-2">{{ $totalUsers }}</div>
                  <p class="text-center">Visitors</p>
                </div>
              </div>
          </div>

          </div>
          <div style="width: 600px; margin: auto;">
            <canvas id="myChart"></canvas>
          </div>
        </div>
    </div>
@endsection
