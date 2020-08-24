@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <ul class="nav flex-column mb-4">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account') }}">Account</a>
          </li>
        </ul>

        <ul class="nav flex-column mb-4">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account.subscriptions') }}">Subscription</a>
          </li>
          @if (auth()->user()->subscribed())
            @can('cancel', auth()->user()->subscription('default'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('account.subscriptions.cancel') }}">Cancel subscription</a>
              </li>
            @endcan
            @can('resume', auth()->user()->subscription('default'))            
              <li class="nav-item">
                <a class="nav-link" href="{{ route('account.subscriptions.resume') }}">Resume subscription</a>
              </li>
            @endcan     
            <li class="nav-item">
              <a href="{{ route('account.subscriptions.swap') }}" class="nav-link">Swap plan</a>
            </li> 

            <li class="nav-item">
              <a href="{{ route('account.subscriptions.coupon') }}" class="nav-link">Apply coupon</a>
            </li>

            <li class="nav-item">
              <a href="{{ route('account.subscriptions.card') }}" class="nav-link">Update card</a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account.subscriptions.invoices') }}">Invoices</a>
          </li>
        </ul>
      </div>
      <div class="col-md-9">
        @yield('account')
      </div>
    </div>
</div>
@endsection