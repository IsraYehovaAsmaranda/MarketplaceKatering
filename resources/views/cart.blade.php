<div>
    @foreach($carts as $cart)
    <div>
        <p> {{$cart->qty}} </p>
    </div>
    @endforeach
</div>
