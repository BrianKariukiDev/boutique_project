<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use phpDocumentor\Reflection\Types\Self_;

class CartManagement
{
    static public function addCartItemsToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    static public function clearCartIteemsFromCookie()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }

    static public function getCartItemsFromCookie()
    {
        $cart_items=Cookie::json_decode(Cookie::get('cart_items'), true);

        if(!$cart_items){
            $cart_items=[];
        }

        return $cart_items;
    }

    static public function addItemTocart($product_id)
    {
        $cart_items=self::getCartItemsFromCookie();

        $existing_item=null;

        foreach($cart_items as $key=>$item){
            if($item['product_id']==$product_id){
                $existing_item=$key;
                break;
            }
        }

        if($existing_item!==null){
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_price']=$cart_items[$existing_item]['quantity']*$cart_items[$existing_item]['price'];
        }else{
            $product=Product::where('id',$product_id)->first(['id','name','sale_price','images']);

            if($product){
                $cart_items=[
                    'product_id'=>$product->id,
                    'name'=>$product->name,
                    'unit_amount'=>$product->sale_price,
                    'quantity'=>1,
                    'total_amount'=>$product->sale_price,
                    'image'=>$product->images[0]
                ];
            }

            Self::addCartItemsToCookie($cart_items);
            return count($cart_items);
        }
    }

    static public function addItemTocartWithQty($product_id, $qty)
    {
        $cart_items=self::getCartItemsFromCookie();

        $existing_item=null;

        foreach($cart_items as $key=>$item){
            if($item['product_id']==$product_id){
                $existing_item=$key;
                break;
            }

            if($existing_item!==null){
                $cart_items[$existing_item]['quantity']+=$qty;
                $cart_items[$existing_item]['total_amount']=$cart_items[$existing_item]['quantity']*$cart_items[$existing_item]['unit_amount'];
            }else{
                $product=Product::where('id',$product_id)->first(['id','name','sale_price','images']);

                if($product){
                    $cart_items=[
                        'product_id'=>$product->id,
                        'name'=>$product->name,
                        'unit_amount'=>$product->sale_price,
                        'quantity'=>$qty,
                        'total_amount'=>$product->sale_price*$qty,
                        'image'=>$product->images[0]
                    ];
                }

                Self::addCartItemsToCookie($cart_items);
                return count($cart_items);
            }
        }
    }

    static  public function removeItemFromCart($product_id)
    {
        $cart_items=self::getCartItemsFromCookie();

        foreach($cart_items as $key=>$item){
            if($item['product_id']==$product_id){
                unset($cart_items[$key]);
                break;
            }
        }

        Self::addCartItemsToCookie($cart_items);
        return  $cart_items;
    }

    static public function incrementCartItemQty($product_id)
    {
        $cart_items=self::getCartItemsFromCookie();

        foreach($cart_items as $key=>$item){
            if($item['product_id']==$product_id){
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount']=$cart_items[$key]['quantity']*$cart_items[$key]['unit_amount'];
                break;
            }
        }

        Self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    static public function decrementCartItemQty($product_id)
    {
        $cart_items=self::getCartItemsFromCookie();

        foreach($cart_items as $key=>$item){
            if($item['product_id']==$product_id){
                if($cart_items[$key]['quantity']>1){
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount']=$cart_items[$key]['quantity']*$cart_items[$key]['unit_amount'];
                }
                break;
            }
        }

        Self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    static public function calculateGrandTotal()
    {
        $cart_items=self::getCartItemsFromCookie();

        return array_sum(array_column($cart_items,'total_amount'));
    }
}