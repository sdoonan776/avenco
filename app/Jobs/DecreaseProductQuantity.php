<?php

namespace App\Jobs;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DecreaseProductQuantity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }
}
