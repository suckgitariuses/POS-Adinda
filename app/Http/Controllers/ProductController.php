<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan halaman kategori produk
    public function showCategories()
    {
        return view('products.categories'); // Pastikan file Blade ini ada
    }

    // Menampilkan halaman produk Food & Beverage
    public function foodBeverage()
    {
        return view('products.food-beverage');
    }

    // Menampilkan halaman produk Beauty & Health
    public function beautyHealth()
    {
        return view('products.beauty-health');
    }

    // Menampilkan halaman produk Home Care
    public function homeCare()
    {
        return view('products.home-care');
    }

    // Menampilkan halaman produk Baby & Kid
    public function babyKid()
    {
        return view('products.baby-kid');
    }
}
