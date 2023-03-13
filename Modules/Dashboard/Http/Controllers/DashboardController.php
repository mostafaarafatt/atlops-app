<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\User;
use Modules\Donations\Entities\Donation;
use Modules\Donations\Entities\Donor;
use Modules\Orders\Entities\Order;
use Modules\Settings\Entities\ContactUs;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $orders_number = Order::count();
        $providers_number = User::where('kind', 'provider')->count();
        $client_number = User::where('kind', 'client')->count();
        return view('dashboard::index', get_defined_vars());
    }
}
