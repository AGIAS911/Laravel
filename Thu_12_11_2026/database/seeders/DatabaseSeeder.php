<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Seller, Category, Product, Order, OrderItem};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(10)->create();
        $categories = Category::factory(5)->create();

        $sellers = collect();
        foreach ($users->take(3) as $user) {
            $sellers->push(Seller::factory()->create(['user_id' => $user->id]));
        }

        $products = Product::factory(20)
            ->recycle($categories)
            ->recycle($sellers)
            ->create();

        Order::factory(15)->recycle($users)->create()->each(function ($order) use ($products) {
            $orderProducts = $products->random(rand(2, 4));
            $totalAmount = 0;

            foreach ($orderProducts as $product) {
                $qty = rand(1, 3);
                OrderItem::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'price' => $product->price 
                ]);
                
                $totalAmount += $product->price * $qty;
            }

            $order->update(['total_amount' => $totalAmount]);
        });
    }
}