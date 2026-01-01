<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class productPageController extends Controller
{
    public function index(Request $request){


        $categories = Category::withCount(['directProducts', 'subcategoryProducts'])->where('status', 1)->get();

        $products = Product::with('subcategory','images', 'sizes')->paginate(12);
        $totalProducts = Product::count();
    
        return view('user.product', compact('products', 'categories', 'totalProducts'));
    }



    public function filterProducts(Request $request)
    {
        Log::info('Filter Products Request:', $request->all());
    
        $query = Product::query();
    
        // Category filter
        if ($request->has('category_id') && $request->category_id !== null) {
            Log::info('Applying category filter with category_id: ' . $request->category_id);
            $query->where('category_id', $request->category_id);
        } else {
            Log::info('No category filter applied.');
        }
    
        // Price filter
        if ($request->has('min_price') && $request->has('max_price')) {
            Log::info('Applying price filter with min_price: ' . $request->min_price . ' and max_price: ' . $request->max_price);
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }
    
        // Rating filter
        if ($request->has('ratings') && count($request->ratings) > 0) {
            Log::info('Applying rating filter with ratings: ' . implode(',', $request->ratings));
            $query->whereIn('rating', $request->ratings);
        } else {
            Log::info('No rating filter applied.');
        }
    
        // Availability filter
        // We include all products, but mark out-of-stock products for the red tag
        if ($request->has('availability') && in_array('In Stock', $request->availability)) {
            Log::info('User wants to show only in-stock items. We can filter here if needed.');
            // Optional: filter if required
            // $query->where('stock', '>', 0);
        } else {
            Log::info('Including out-of-stock items as well.');
        }
    
        $perPage = 12; // Number of products per page
        $page = $request->get('page', 1);
        
        $products = $query->paginate($perPage, ['*'], 'page', $page);    
        // Render Blade partial with products
        $html = view('user.components.product-cards', compact('products'))->render();
    
        Log::info('Number of products returned after filters: ' . $products->count());
    
        return response()->json([
            'html' => $html,
            'count' => $products->total(),
            'last_page' => $products->lastPage(),
            'current_page' => $products->currentPage()
        ]);
        
    }
    
    
    
}
