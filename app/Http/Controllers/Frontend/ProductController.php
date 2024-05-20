<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Person;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        // $categories = Category::where('type', 'product')->orderBy('created_at', 'DESC')->get();
        $categories = Category::where(['type'=> 'product','category_id'=>null])->orderBy('created_at', 'DESC')->get();

        return view('frontend.product.index', compact('categories'));
    }

    public function category(Category $category)
    {
        $products = Product::with(['category', 'media'])->where('category_id', $category->id)->paginate();

        //$some_product = Book::with(['writer', 'category', 'created_by', 'media'])->orderBy('created_at', 'DESC')->get();

        return view('frontend.product.category', compact('products', 'category'));
    }

    public function order(){
        return view('frontend.product.order');
    }


    public function store_order(Request $request){
       $order=Order::create($request->all());

        foreach(session('cart')['products'] as $id => $details){
            $item=new Order_item();
            $item->order_id =$order->id;
            $item->product_id =$details['product_id'];
            $item->qty =$details['quantity'];
            $item->price =$details['price'];
            $item->total =$details['price']*$details['quantity'];
            $item->save();

        }
       session()->forget('cart');
       return redirect('/success_order');

    }

    public function success_order(){


        return view('frontend.success_order');
    }

    public function store_cart(Request $request)
    {
        $id=$request->id;
        $product=Product::find($id);
        $cart = session()->get('cart', []);
        // if cart is empty then this the first product
        if (!$cart) {
            $cart['products'][$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];

            // if cart not empty then check if this product exist then increment quantity
        } else if (isset($cart['products'][$id])) {
            $cart['products'][$id]['quantity'];
                $cart['products'][$id]['quantity']++;
            // if item  exist in cart then add to cart with quantity = 1++
        } else {

            $cart['products'][$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,

            ];
        }
        session()->put('cart', $cart);

        return response()->json([
            'status' => true,
            'message' => 'add cart'
        ]);
    }

    public function update_cart(Request $request){


        if ($request->ids && $request->qty) {
            $cart = session()->get('cart');

            foreach ($request->ids as $key=>$id){
                $cart['products'][$id]["quantity"] = $request->qty[$key];
                session()->put('cart', $cart);
            }

        }

        return redirect()->back();
    }

    public function cart_remove($id){


        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart['products'][$id])) {
                unset($cart['products'][$id]);
                session()->put('cart', $cart);
            }
            if (count($cart['products'])==0){
                session()->forget('cart');
            }

            return redirect()->back();
        }

    }

    public function show($id)
    {
        $product=Product::findOrFail($id);

        return view('frontend.product.show', compact('product'));
    }

    public function show_cart(){


        return view('frontend.product.cart');
    }
}
