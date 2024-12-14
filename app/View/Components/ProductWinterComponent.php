<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Product;


class ProductWinterComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = Product::where('id_category', 4)
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();
        return view(
            'components.product-winter-component',
            ["products" => $products]
        );
    }
}
