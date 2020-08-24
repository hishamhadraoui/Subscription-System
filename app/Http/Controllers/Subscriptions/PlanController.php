<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;

class PlanController extends Controller
{
  public function index()
  {
    $plans = Plan::get();
    return view('subscriptions.plans', compact('plans')); 
  }
}
