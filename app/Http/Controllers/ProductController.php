<?php

namespace App\Http\Controllers;

use App\DTO\ProductDto;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\UseCases\EditProductUseCase;
use App\UseCases\StoreProductUseCase;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $products = Product::query()
            ->with(['attributes'])
            ->get();
        return response()->json(['data' => $products]);
    }

    public function show(int $product_id): JsonResponse
    {
        $product = Product::query()
            ->with(['attributes'])
            ->find($product_id);
        if (!$product) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json(['data' => $product]);
    }

    /**
     * @throws Exception
     */
    public function store(ProductStoreRequest $request, StoreProductUseCase $storeProductEntityUseCase): JsonResponse
    {
        $product = $storeProductEntityUseCase->execute(ProductDto::fromArray([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'product_type_id' => $request->input('product_type_id'),
            'product_attributes' => $request->input('product_attributes')
        ]));

        return response()->json(['data' => $product->load('attributes')]);
    }

    /**
     * @throws Exception
     */
    public function edit(ProductEditRequest $request, $product_id, EditProductUseCase $editProductUseCase): JsonResponse
    {
        $product = $editProductUseCase->execute(ProductDto::fromArray([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'product_type_id' => $request->input('product_type_id'),
            'product_attributes' => $request->input('product_attributes')
        ]), $product_id);

        return response()->json(['data' => $product->load('attributes')]);
    }

    public function delete(int $product_id): JsonResponse
    {
        /** @var Product $department */
        $product = Product::query()
            ->find($product_id);
        if (!$product) {
            return response()->json(['error' => 'Not found'], 404);
        }
        ProductAttribute::query()->where('product_id', $product_id)->delete();
        $product->delete();
        return new JsonResponse(["message" => "Product deleted"]);
    }
}
