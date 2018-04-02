<?php

namespace App\Http\Controllers\Api;

use App\About;
use App\Cart;
use App\Classification;
use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getClassification(Request $request)
    {
    	$header_lang = $request->header('Content-Language');
        $classifications = $this->translatedCollectionToArray(Classification::all()->translate($header_lang, 'fallbackLocale'));


        foreach ($classifications as $class) {
            $categoriesArray[] = [
                'id' => $class['id'],
                'name' => $class['name'],
                'image' => "http://shishty.mapmall.co/storage/" . $class['image'],
            ];
        }
        
    	return response()->json(['status' => 'true' ,'data' =>$categoriesArray , 'error' => ''],200);
    }

    public function getFirst3Products(Request $request)
    {
        $header_lang = $request->header('Content-Language');
        $category_id = $request->category_id;
        $class = Classification::find($category_id);

        if($class == null)
        {
            return response()->json(['status' => 'false' ,'data' =>'' , 'error' => 'Category not founded'],200);
        }else
        {
            $products = $this->translatedCollectionToArray(Product::where('category_id',$category_id)->orderBy('created_at','desc')->take(3)->get()->translate($header_lang, 'fallbackLocale'));

            
            foreach ($products as $product) {
                $categoriesArray[] = [
                    'id' => $product['id'],
                    'title' => $product['title'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'image' => "http://shishty.mapmall.co/storage/" . $product['image'],
                    'category_id' => $product['category_id'],
                ];
            }
            return response()->json(['status' => 'true' ,'data' =>$categoriesArray , 'error' => ''],200);
        }   
    }

    public function getProducts(Request $request)
    {
    	$header_lang = $request->header('Content-Language');
    	$category_id = $request->category_id;
    	$class = Classification::find($category_id);

    	if($class == null)
    	{
    		return response()->json(['status' => 'false' ,'data' =>'' , 'error' => 'Category not founded'],200);
    	}else
    	{

            $count = Product::count();
            $skip = 3;
            $limit = $count - $skip; // the limit

    		$products = $this->translatedCollectionToArray(Product::where('category_id',$category_id)->orderBy('created_at','desc')->skip($skip)->take($limit)->get()->translate($header_lang, 'fallbackLocale'));

            if(count($products) > 0)
            {
                foreach ($products as $product) {
                    $categoriesArray[] = [
                        'id' => $product['id'],
                        'title' => $product['title'],
                        'description' => $product['description'],
                        'price' => $product['price'],
                        'image' => "http://shishty.mapmall.co/storage/" . $product['image'],
                        'category_id' => $product['category_id'],
                    ];
                }
            }else
            {
                $categoriesArray = '';
            }
            
    		return response()->json(['status' => 'true' ,'data' =>$categoriesArray , 'error' => ''],200);
    	}	
    }

    public function addToCart(Request $request)
    {
        $validator_required = Validator::make($request->all(),
            [
                'product_id' => 'required',
                'quantity' => 'required',
                'deviceToken' => 'required',
            ]);

        if ($validator_required->fails())
        {
            return response()->json(['status' => 'false','data'=> ' ' ,'error' => $validator_required->errors()->first()],200);
        }


        if(Product::find($request->product_id) == null)
        {
            return response()->json(['status' => 'false','data'=> '','error' => 'the product not found'],200);
        }

        $cart = new Cart;
        $cart->product_id = $request->product_id;
        $cart->user_token = $request->deviceToken;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json(['status' => 'true','data'=> 'Done Successfully','error' => ''],200);
    }

    public function removeFromCart(Request $request)
    {
        $validator_required = Validator::make($request->all(),
            [
                'product_id' => 'required',
                'deviceToken' => 'required',
            ]);

        if ($validator_required->fails())
        {
            return response()->json(['status' => 'false','data'=> ' ' ,'error' => $validator_required->errors()->first()],200);
        }


        if(Product::find($request->product_id) == null)
        {
            return response()->json(['status' => 'false','data'=> '','error' => 'the product not found'],200);
        }

        $cart = Cart::where('product_id',$request->product_id)->where('user_token',$request->deviceToken)->get()->first();
        $cart->delete();
        return response()->json(['status' => 'true','data'=> 'Done Successfully','error' => ''],200);
    }

    public function getMyCart(Request $request)
    {
        $validator_required = Validator::make($request->all(),
            [
                'deviceToken' => 'required',
            ]);

        if ($validator_required->fails())
        {
            return response()->json(['status' => 'false','data'=> ' ' ,'error' => $validator_required->errors()->first()],200);
        }

        $header_lang = $request->header('Content-Language');
        $carts = Cart::where('user_token',$request->deviceToken)->orderBy('created_at','desc')->get();

        if($carts->count() > 0)
        {
             foreach ($carts as $cart) {
                $product =Product::find($cart->product_id);

                $categoriesArray[] = [
                    'product_id' => $product->id,
                    'title' => $product->getTranslatedAttribute('title', $header_lang , 'fallbackLocale'),
                    'description' => $product->getTranslatedAttribute('description', $header_lang , 'fallbackLocale'),
                    'price' => $product->price,
                    'image' => "http://shishty.mapmall.co/storage/" . $product->image,
                    'category_id' => $product->category_id,
                    'quantity' => $cart->quantity,
                ];
            }
        }else
        {
            $categoriesArray = '';
        }
        
        return response()->json(['status' => 'true','data'=> $categoriesArray,'error' => ''],200);
    }

    public function newOrder(Request $request)
    {
        $validator_required = Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255|email',
                'address' => 'required|max:255',
                'mobile' => 'required|max:255',
                'city' => 'required|max:255',
                'state' => 'required|max:255',
                'zip_code' => 'required|max:255',
                'country' => 'required|max:255',
                'deviceToken' => 'required|max:255',
            ]);

        if ($validator_required->fails())
        {
            return response()->json(['status' => 'false','data'=> ' ' ,'error' => $validator_required->errors()->first()],200);
        }

        $order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip_code = $request->zip_code;
        $order->country = $request->country;
        $order->user_token = $request->deviceToken;
        $order->save();

        $carts = Cart::where('user_token',$order->user_token)->orderBy('created_at','desc')->get();


        $email = $order->email;
        $mobile = $request->mobile;

        Mail::send('emailContactUs', ['name' => $order->name, 'email' => $order->email , 'address' => $order->address ,'city' => $order->city , 'state' => $order->state ,'zip_code' => $order->zip_code ,'country' => $order->country ,'products' => $carts,'mobile' => $mobile], function ($message) use ($email)
        {

            $message->from($email, $name= null);

            $message->to('eng.nour.ziadaa@gmail.com' ,'Admin');

            $message->subject("New Order From Shishty Application");

        });

        foreach($carts as $cart)
        {
            $cart = Cart::find($cart->id);
            $cart->delete();
        }

        return response()->json(['status' => 'true','data'=> 'Done Successfully','error' => ''],200);
    }

    public function getAboutUs(Request $request)
    {
        $header_lang = $request->header('Content-Language');
        $about = About::first()->translate($header_lang);
        
        $aboutArray = ['description' => $about->description , 'image' => 'http://shishty.mapmall.co/storage/' . $about->image];
        return response()->json(['status' => 'true' ,'data' =>$aboutArray , 'error' => ''],200);
    }

    public function getContactUs(Request $request)
    {
        $header_lang = $request->header('Content-Language');
        $contact = ContactUs::first();
        
        return response()->json(['status' => 'true' ,'data' =>$contact , 'error' => ''],200);
    }

    private function translatedCollectionToArray(\TCG\Voyager\Translator\Collection $translatedCollection) 
    {
        $collectionArray = array();
        foreach($translatedCollection as $collectionElement)
        {
            $collectionArray[] = array_map(function($rawAttributeData) { return $rawAttributeData['value']; }, $collectionElement->getRawAttributes());
        }
        return $collectionArray;
    }
}
