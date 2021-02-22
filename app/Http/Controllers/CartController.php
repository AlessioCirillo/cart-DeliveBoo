<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;


class CartController extends Controller
{
    

    public function cart(){
        return view('cart');
    }

    public function add($id){
        $dish = Dish::find($id);
        
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $dish->name,
                    'quantity' => 1,
                    'price' => $dish->price,                  
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', "added to cart");
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            
            session()->put('cart', $cart);
            return redirect()->back()->with('success', "added to cart");
        }

        $cart[$id] = [
            'name' => $dish->name,
            'quantity' => 1,
            'price' => $dish->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', "added to cart");
    }

    public function update(Request $request){

        if($request->id and $request->quantity){
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            // session()->flash('success', 'cart update successfuly');
            return redirect()->back()->with('success', "updated to cart");
        }
    }

    public function remove(Request $request){

        if($request->id){
            $cart = session()->get('cart');

            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
            return redirect()->back()->with('success', "removed from cart");
        }

    // public function remove($id)
    // {
    //     $cart = session()->get('cart');

    //     if (isset($cart[$id])) {
    //         unset($cart[$id]);
    //         session()->put('cart', $cart);
    //     }
    //     return redirect()->back()->with('success', "added to cart");
    // }
        
    public function index(){
        return view('cart.index');
    }

}
    
//     public function add(Dish $dish){

//         $cart = session()->get('cart');

//         if(!$cart){
//             $cart = [
//                 $dish->id => [
//                     'name' => $dish->name,
//                     'quantity' => 1,
//                     'price' => $dish->price,                  
//                 ]
//             ];
//             session()->put('cart', $cart);
//             return redirect()->back()->with('success', "added to cart");
//         }

//         if(isset($cart[$dish->id])){
//             $cart[$dish->id]['quantity']++;
//             session()->put('cart', $cart);
//             return redirect()->back()->with('success', "added to cart");
//         }

//         $cart[$dish->id] = [
//             'name' => $dish->name,
//             'quantity' => 1,
//             'price' => $dish->price,
//         ];
//         session()->put('cart', $cart);
//         return redirect()->back()->with('success', "added to cart");
//     }


//         // dd($dish);
//         // \Cart::session($sessionKey);

//         // add the product to cart
//         // \Cart::session($dish)->add(array(
//         //     'id' => uniqid($dish->id),
//         //     'name' => $dish->name,
//         //     'price' => $dish->price,
//         //     'quantity' => 4,
//         //     'attributes' => array(),
//         //     'associatedModel' => $dish
//         // ));

//         // return redirect()->route('cart.index');

//         public function remove($id){
//             $cart = session()->get('cart');

//             if(isset($cart[$id])){
//                 unset($cart[$id]);
//                 session()->put('cart', $cart);
//             }
//             return redirect()->back()->with('success', "added to cart");
//         }
        
        
// }

