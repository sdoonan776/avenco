<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Coupon;
use App\Models\Product;
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
    protected $coupon;

    public function __construct(
        ProductRepositoryInterface $productRepository,        
        Coupon $coupon
    )
    {
        $this->productRepository = $productRepository;
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
    public function update(UpdateCartQuantityRequest $request, int $id): JsonResponse
    {
    
        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified item from cart instance
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Cart::remove($id);
        return back()->with('success_message', 'Item has been removed');
    }

    /**
     * Clear cart instance of all items
     * @return RedirectResponse
     */
    public function clearCart(): RedirectResponse
    {
        Cart::destroy();
        return back()->with('success_message', 'Cart has been successfully cleared');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function switchToSaveForLater($id):  RedirectResponse
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate(Product::class);

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }
}
