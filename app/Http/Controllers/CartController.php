<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Coupon;
use App\Models\Product;
use App\Services\CouponDiscountService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CartController extends Controller
{
    protected $productRepository;
    protected $couponDiscountService;
    protected $coupon;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CouponDiscountService $couponDiscountService,
        Coupon $coupon
    )
    {
        $this->productRepository = $productRepository;
        $this->couponDiscountService = $couponDiscountService;
        $this->coupon = $coupon;
    }   

    /**
     * Returns cart index page
     *
     * @return View
     */
    public function index(): View
    {
        return view('cart.index', [
            'discount' => $this->coupon->getDiscount(),
            'tax' => $this->coupon->getTax(),
            'code' => $this->coupon->getCode(),
            'newSubTotal' => $this->coupon->getNewSubTotal(),
            'newTax' => $this->coupon->getNewTax(),
            'newTotal' => $this->coupon->getNewTotal(),
        ]);                                        
    }
    
    /**
     * Add a new item to the cart.
     *
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function store(Product $product): RedirectResponse
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }

        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate(Product::class);

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
    }

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCartQuantityRequest $request, $id): JsonResponse
    {
    
        if ($request->qty > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->qauntity);

        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified item from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Cart::remove($id);
        return back()->with('success_message', 'Item has been removed');
    }

    public function clearCart(): RedirectResponse
    {
        Cart::destroy();
        return back()->with('success_message', 'Cart has been successfully cleared');
    }
}
