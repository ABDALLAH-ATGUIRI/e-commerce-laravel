<?php

namespace App\Actions\ProductActions;

use App\Actions\GlobalActions\UploadImage;
use App\Models\Product;

class CreateProductAction
{
    public function execute(array $data)
    {
        try {
            // Create Product
            Product::create([
                'name' => $data['name'],
                'image' => UploadImage::upload($data),
                'price' => $data['price'],
                'description' => $data['description'],
                'category_id' => $data['category_id'],
                'user_id' => auth()->user()->id
            ]);

            // Return Json Response
            return response()->json([
                'message' => "Product successfully created."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went really wrong!'
            ], 500);
        }
    }
}
