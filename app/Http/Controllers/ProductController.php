<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Seller;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $warranties;

    public function __construct(){
        $this->warranties = config("product.warranties");
        $this->file_stored = '/public/products/';
        $this->file_path = storage_path('app/public/products');
        $this->file_path_view = \Request::root().'/storage/products/';
    }


    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(8);
        return view('products.index')->with('products', $products)
                                ->with('file_path_view', $this->file_path_view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $categories = Category::all();
        $brands = Brand::all();
        $sellers = Seller::all();
        
        return view('products.add')->with('product', $product)
                                   ->with('categories', $categories)
                                   ->with('brands', $brands)
                                   ->with('sellers', $sellers)
                                   ->with('warranties', $this->warranties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {   
        $givenData = $request->only(['name', 'code', 'category_id', 'price', 'quantity', 'description', 'brand_id', 'seller_id', 'warranty']);
        $product = Product::create($givenData);

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $filename = $product->name.'_'.time().'.'.$uploadedFile->extension();

            if (!is_dir($this->file_path)) {
                mkdir($this->file_path, 0777);
            }

            $uploadedFile->storeAs($this->file_stored, $filename);
            $url = '/storage/products/'.$filename;

            $imageUpload = new Image([
                'name' => $filename,
                'url' => $url,
                'type' => 1
            ]);

            $product->images()->save($imageUpload); 
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function indexapi()
    {
        $products = Product::all();
        foreach($products as $product){
            $image = $product->images()->where('type', 1)->first();
            if (!empty($image)) {
                $product['image'] = 'http://127.0.0.1:8000/storage/products/'.$image->name;
            }
        }
        return $products;
    }

}
