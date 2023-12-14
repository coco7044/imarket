<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfileInfo;
use App\Services\CartService;
use App\Jobs\SendThanksMail;
use App\Jobs\SendOrderedMail;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        $totalPrice = 0;

        foreach($products as $product){
            $totalPrice += $product->price * $product->pivot->quantity;
        }

        //dd($products, $totalPrice);

        return view('user.cart', 
            compact('products', 'totalPrice'));
    }

    public function add(Request $request)
    {
        $itemInCart = Cart::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())->first();

        if($itemInCart){
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();

        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }
        
        return redirect()->route('user.cart.index');
    }

    public function delete($id)
    {
        Cart::where('product_id', $id)
        ->where('user_id', Auth::id())
        ->delete();

        return redirect()->route('user.cart.index');
    }

    public function checkout()
    {

        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        
        $lineItems = [];
        foreach($products as $product){
            $quantity = '';
            $quantity = Stock::where('product_id', $product->id)->sum('quantity');

            if($product->pivot->quantity > $quantity){
                return redirect()->route('user.cart.index');
            } else {
                $lineItem = [
                                'price_data' => [
                                    'unit_amount' => $product->price,
                                    'currency' => 'JPY',
                                    'product_data' => [
                                                        'name' => $product->name,
                                                        'description' => $product->information,
                                                        ],
                                                ],
                                    'quantity' => $product->pivot->quantity,
                            ];
                array_push($lineItems, $lineItem);
            }
        }
        // dd($lineItems);
        foreach($products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => \Constant::PRODUCT_LIST['reduce'],
                'quantity' => $product->pivot->quantity * -1
            ]);
        }


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('user.cart.success'),
            'cancel_url' => route('user.cart.cancel'),
        ]);

        $publicKey = env('STRIPE_PUBLIC_KEY');

        return view('user.checkout', 
            compact('session', 'publicKey'));
    }

    public function success()
    {

        DB::beginTransaction();
        try{
        $carts = Cart::where('user_id', Auth::id());
        $purchase = Purchase::create([
            'user_id'=>Auth::id(),
            'status'=> 0,
        ]);
    
        foreach($carts->get() as $cart){
            $purchase->products()->attach($purchase->id,[
                'product_id' => $cart->product_id,
                'quantity'=> $cart->quantity,
                'purchase_product_price'=> Product::where('id','=',$cart->product_id)->select('price')->first()->price,
            ]);
        }
        DB::commit();

        ////
        $items = Cart::where('user_id', Auth::id())->get();
        $products = CartService::getItemsInCart($items);
        $user = User::findOrFail(Auth::id());

        SendThanksMail::dispatch($products, $user);
        SendOrderedMail::dispatch($products, $user);
        // dd('ユーザーメール送信テスト');
        ////

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('user.items.index');

        }catch(\Exception $e){
            DB::rollback();
        }

    }

    public function cancel()
    {
        $user = User::findOrFail(Auth::id());

        foreach($user->products as $product){
            Stock::create([
                'product_id' => $product->id,
                'type' => \Constant::PRODUCT_LIST['add'],
                'quantity' => $product->pivot->quantity
            ]);
        }

        return redirect()->route('user.cart.index');
    }

    public function checkoutInfo(){

        $user = User::findOrFail(Auth::id());
        $userId = $user->id;
        $userInfoExe = UserProfileInfo::where('user_id',$userId)->exists();
        if( $userInfoExe ){
            $user_info = UserProfileInfo::where('user_id',$userId)->first();
        }else{
            $user_info = null;
        }
        return view('user.checkoutInfo',compact('user_info'));

    }
}