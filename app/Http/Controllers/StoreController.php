<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('stock', '>', 0);

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(16)->withQueryString();
        $categories = Product::distinct()->pluck('category')->sort()->values();

        return view('store.index', compact('products', 'categories'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!')->with('cart_open', true);
    }

    public function cart()
    {
        return view('store.cart');
    }
    
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            session()->flash('cart_open', true);
        }
        return redirect()->back();
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }

    public function incrementCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function decrementCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    private function cartSummary()
    {
        $cart = session()->get('cart', []);
        $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
        $count    = collect($cart)->sum('quantity');
        return [
            'cart'     => $cart,
            'subtotal' => $subtotal,
            'total'    => round($subtotal + 99 + ($subtotal * 0.18)),
            'count'    => $count,
        ];
    }

    public function ajaxIncrement($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        $s = $this->cartSummary();
        return response()->json([
            'qty'        => $cart[$id]['quantity'] ?? 0,
            'item_total' => number_format(($cart[$id]['price'] ?? 0) * ($cart[$id]['quantity'] ?? 0), 0),
            'subtotal'   => number_format($s['subtotal'], 0),
            'total'      => number_format($s['total'], 0),
            'count'      => $s['count'],
            'removed'    => false,
        ]);
    }

    public function ajaxDecrement($id)
    {
        $cart = session()->get('cart', []);
        $removed = false;
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
                $removed = true;
            }
            session()->put('cart', $cart);
        }
        $s = $this->cartSummary();
        return response()->json([
            'qty'        => $removed ? 0 : $cart[$id]['quantity'],
            'item_total' => $removed ? 0 : number_format(($cart[$id]['price'] ?? 0) * ($cart[$id]['quantity'] ?? 0), 0),
            'subtotal'   => number_format($s['subtotal'], 0),
            'total'      => number_format($s['total'], 0),
            'count'      => $s['count'],
            'removed'    => $removed,
        ]);
    }

    public function ajaxRemove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $s = $this->cartSummary();
        return response()->json([
            'subtotal' => number_format($s['subtotal'], 0),
            'total'    => number_format($s['total'], 0),
            'count'    => $s['count'],
            'removed'  => true,
        ]);
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('store.index')->with('error', 'Your cart is empty. Please add items before checking out.');
        }
        return view('store.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        // Simple mock validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|string|max:10',
            'payment_method' => 'required|in:cod,card,upi'
        ]);

        // Mock Order Processing
        // Normally we'd save an Order and OrderItems to the database here.
        
        // Clear the cart
        session()->forget('cart');

        // Generate a random mock order ID
        $orderId = 'ORD-' . strtoupper(uniqid());

        return redirect()->route('store.success')->with('orderId', $orderId);
    }

    public function success()
    {
        if (!session('orderId')) {
            return redirect()->route('store.index');
        }
        return view('store.success');
    }
}

