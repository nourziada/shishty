<?php

namespace App\Http\Controllers\Api;

use App\Classification;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

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
                'image' => "http://127.0.0.1:8000/storage/" . $class['image'],
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
                    'image' => "http://127.0.0.1:8000/storage/" . $product['image'],
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
                        'image' => "http://127.0.0.1:8000/storage/" . $product['image'],
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
