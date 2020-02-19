<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::orderBy('name', 'desc')->paginate(config('olshop.pagination'));
		$products->load('categories');
		return view('admin.product.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = Category::all();
		return view('admin.product.create', [
			'categories' => $categories
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required|min:10',
			'price' => 'required|numeric',
			'category.*' => 'required'
		]);

		// menyimpan gambar kedalam folder products
		$image = $request->file('image')->store('products');

		$product = Product::create([
			'name' => $request->name,
			'slug' => str_slug($request->name),
			'description' => $request->description,
			'price' => $request->price,
			'image' => $image
		]);

		// mengambil data relasi
		$categories = Category::find($request->category);

		// simpan category
		$product->categories()->attach($categories);

		return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		$categories = Category::all();
		return view('admin.product.edit', [
			'product' => $product,
			'categories' => $categories
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product)
	{
		$image = $product->image ?? null;

		// hapus gambar lama yg telah diupdate
		if ($request->hasFile('image')) {
			if ($product->image) {
				Storage::delete($product->image);
			}
			$image = $request->file('image')->store('products');
		}

		// if (!$request->hasFile('image') && $product->image) {
		//     $image = $product->image;
		// }

		$product->update([
			'name' => $request->name,
			'slug' => str_slug($request->name),
			'description' => $request->description,
			'price' => $request->price,
			'image' => $image
		]);

		$product->categories()->sync($request->category);

		return redirect()->route('product.index')->with('success', 'Data berhasil diupdate!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		Storage::delete($product->image);
		$product->delete();
		return redirect()->route('product.index')->with('success', 'Data berhasil dihapus!');
	}
}
