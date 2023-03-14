<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderValidation;

use App\Models\Comment;

use App\Models\Favorites;



use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\Service;
use Modules\Categories\Entities\SubCategory;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Modules\Orders\Entities\Order;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    public function createOrder(CreateOrderValidation $request)
    {

        $country = Country::where('id', $request->Section)->first();
        $city = City::where('id', $request->product)->first();

        $order = Order::create([
            'name' => $request->orderName,
            'description' => $request->orderDescription,
            'expected_start_price' => $request->startPrice,
            'expected_end_price' => $request->endPrice,
            'phone' => $request->phone,
            'contact_type' => $request->contact,
            'type' => auth()->user()->kind == 'client' ? 'individual' : 'company',
            'user_id' => auth()->user()->id,
            'category_id' => $request->categoryId,
            'sub_category_id' => $request->subCategory,
            'service_id' => $request->additionalService,
            'country_id' => $country->id,
            'city_id' => $city->id,

        ]);

        if ($images = $request->file('photo')) {
            foreach ($images as $image) {
                $order->addMedia($image)->toMediaCollection('order_images');
            }
        }

        if (auth()->user()->kind == "client") {
            return redirect()->route('peopleOrders');
        } else {
            return redirect()->route('companyOrders');
        }
    }

    public function peopleOrders()
    {
        $categoris = Category::all();
        // return $categoris;
        $subcategoris = SubCategory::all();
        // return $subcategoris;
        $services = Service::all();
        // return $services;
        $countries = Country::all();
        // return $countries;
        $user_orders = Order::where('type', 'individual')->where('status', 0)->get();
        // $company_orders = Order::where('order_type',"0")->get();
        //return $user_orders;

        return view('frontend.orders.peopleOrders', compact('categoris', 'subcategoris', 'services', 'countries', 'user_orders'));
    }

    public function companyOrders()
    {
        $categoris = Category::all();
        $subcategoris = Subcategory::all();
        $services = Service::all();
        $countries = Country::all();
        $company_orders = Order::where('type', "company")->where('status', 1)->get();
        // return $orders;
        return view('frontend.orders.companyOrders', compact('categoris', 'subcategoris', 'services', 'countries', 'company_orders'));
    }

    public function orderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $comments = Comment::where(['order_id' => $id, 'parent_id' => null])->get();

        return view('frontend.orders.orderDetails', compact('order', 'comments'));
    }

    public function orderComment(Request $request)
    {
        //return $request;
        $data = $request->all();
        Comment::create($data);
        return back();
    }

    public function allOrders()
    {


        $user_orders = Order::where('type', "individual")->where('user_id', auth()->user()->id)->where('status', "0")->get();
        //return $user_orders;

        $company_orders = Order::where('type', "company")->where('user_id', auth()->user()->id)->where('status', "0")->get();
        //return $company_orders;

        $ended_user_order = Order::where('type', "individual")->where('user_id', auth()->user()->id)->where('status', "1")->get();
        //return $ended_user_order;

        $ended_company_order = Order::where('type', "company")->where('user_id', auth()->user()->id)->where('status', "1")->get();
        //return $ended_company_order;

        return view('frontend.orders.showAllOrders', compact('user_orders', 'company_orders', 'ended_user_order', 'ended_company_order'));
    }

    public function endOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $comments = Comment::where('order_id', $id)->get();

        return view('frontend.orders.endOrderDetails', compact('order', 'comments'));
    }

    public function endOrderDone($id)
    {
        Order::where('id', $id)->update(['status' => 1]);
        return redirect()->route('home');
    }

    public function rePublishOrder($id)
    {
        Order::where('id', $id)->update(['status' => 0]);
        return redirect()->route('home');
    }

    public function favorites()
    {
        $fav = Favorites::where(['user_id' => auth()->user()->id])->get('order_id');

        $orders = [];
        foreach ($fav as $fav) {
            array_push($orders, Order::where('id', $fav->order_id)->first());
        }

        return view('frontend.orders.favoriteOrders', compact('orders'));
    }

    public function orderNotificationDetails($id, $notification_id)
    {

        $notification = auth()->user()->notifications()->where('id', $notification_id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        $order = Order::where('id', $id)->first();
        $comments = Comment::where(['order_id' => $id, 'parent_id' => null])->get();

        return view('frontend.orders.orderDetails', compact('order', 'comments'));
    }



    //dashbord methods -----------------------------------------------------

    public function getOrders()
    {
        $user_orders = Order::where('order_type', "0")->get();
        return view('dashboard.orders.orders', compact('user_orders'));
    }

    public function deleteOrder(Request $request)
    {
        Order::where('id', $request->order_id)->delete();
        return back();
    }

    public function newOrders()
    {
        $user_orders = Order::where('ended_order', '0')->get();
        return view('dashboard.orders.orders', compact('user_orders'));
    }

    public function expireOrders()
    {
        $user_orders = Order::where('ended_order', '1')->get();
        return view('dashboard.orders.orders', compact('user_orders'));
    }
}
