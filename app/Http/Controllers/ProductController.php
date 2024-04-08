<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('admin.product.home', compact(['products', 'total']));
    }

    public function userIndex()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('user.product.home', compact(['products', 'total']));
    }

    public function create()
    {
        $categories = Category::all();
        $branches = Branch::all();
        return view('user.product.create', compact('categories', 'branches'));
        //return view('admin.product.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
          'name' => ['required', 'string', 'max:30'],
        'description' => ['required', 'string', 'max:100'],
        'category_id' => 'required',
        'branch_id' => 'required',
        'price' => 'required|decimal:5,2',
        'purchase_date' => 'required',
        ]);
        //$data = Product::create($request);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->branch_id = $request->branch_id;
        $product->price = $request->price;
        $product->purchase_date = $request->purchase_date;
        if ($product->save()) {
            session()->flash('success', 'Product Add Successfully');
            return redirect(route('user/products'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('user.products/create'));
        }
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $branches = Branch::all();
        return view('user.product.update', compact('products','categories', 'branches'));
    }

    public function editAdmin($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $branches = Branch::all();
        return view('admin.product.updateAdmin', compact('products','categories', 'branches'));
    }

    public function delete($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Product Deleted Successfully');
            return redirect(route('user/products'));
        } else {
            session()->flash('error', 'Product Not Delete successfully');
            return redirect(route('user/products'));
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->branch_id = $request->branch_id;
        $product->price = $request->price;
        $product->purchase_date = $request->purchase_date;
        if ($product->update()) {
            session()->flash('success', 'Product Update Successfully');
            return redirect(route('user/products'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('user/products/update'));
        }
    }

    public function updateAdmin(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->status = $request->status;
        $product->comment = $request->comment;
        if ($product->update()) {
            session()->flash('success', 'Product Update Successfully');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/products/updateAdmin'));
        }
    }
}
