<div class="col-md-12 my-2">
    <div class="card mb-3 order-card">
        <div class="row g-0">
            <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                <a href="{{ route('orderdetails', ['id' => $orders->id]) }}">
                    <img src='{{ $order->getImage() }}' class=" rounded-circle img-fluid img-fluid" alt="..."
                        width="120px" height="120px">
                </a>
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('orderdetails', ['id' => $orders->id]) }}">
                            <h5 id="orderName" class="card-title"> {{ $orders->name }} </h5>
                        </a>

                        @if ($orders->getfav(auth()->user()->id, $orders->id))
                            <a href="" id="addWish" class="like"
                                onclick="addtowishlist({{ $orders->id }},{{ auth()->user()->id }})">
                                <i class="fas fa-heart fa-2xl" id="wishlist-{{ $orders->id }}"></i>
                            </a>
                        @else
                            <a href="" id="addWish" class="like"
                                onclick="addtowishlist({{ $orders->id }},{{ auth()->user()->id }})">
                                <i class="far fa-heart fa-2xl" id="wishlist-{{ $orders->id }}"></i>
                            </a>
                        @endif

                    </div>
                    <small class="text-secondary fw-bold">{{ $orders->country->name }} ,
                        {{ $orders->city->name }}</small>
                    <p class="text-dark">{{ $orders->description }}</p>
                    <div class="d-flex justify-content-between more-details">
                        <p class="price fw-bold">السعر المتوقع: {{ $orders->expected_start_price }} ألف -
                            {{ $orders->expected_end_price }} ألف</p>
                        <strong class="text-secondary">تم النشر فى
                            {{ $orders->created_at }}</strong>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
