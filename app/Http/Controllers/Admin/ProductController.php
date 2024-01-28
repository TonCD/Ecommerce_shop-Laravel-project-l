<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    // public function index()
    // {
    //     return view('admin.product.list', [
    //         'title' => 'Products List',
    //         'products' => $this->productService->get()
    //     ]);
    // }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add new product',
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();
    }

    // public function show(Product $product)
    // {
    //     return view('admin.product.edit', [
    //         'title' => 'Edit Product',
    //         'product' => $product,
    //         'menus' => $this->productService->getMenu()
    //     ]);
    // }


    // public function update(Request $request, Product $product)
    // {
    //     $result = $this->productService->update($request, $product);
    //     if ($result) {
    //         return redirect('/admin/products/list');
    //     }

    //     return redirect()->back();
    // }


    // public function destroy(Request $request)
    // {
    //     $result = $this->productService->delete($request);
    //     if ($result) {
    //         return response()->json([
    //             'error' => false,
    //             'message' => 'Remove successfully'
    //         ]);
    //     }

    //     return response()->json([
    //         'message'=> 'Remove unsuccessfully',
    //         'error' => true,
    //     ]);
    // }
}
