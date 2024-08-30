@extends('layouts.common')

@section('common_content')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="cart-page">
    <!-- Breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">
                            <a href="{{ url('home/index.html') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                            Wishlist
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Wishlist Table -->
    <div class="container">
        <div class="my-6">
            <h1 class="text-center">My Wishlist on Electro</h1>
        </div>
        <div class="mb-16 wishlist-table">
            <div class="table-responsive">
                {{-- Uncomment to debug wishlist data --}}
                {{-- <pre>{{ var_dump($wishlists) }}</pre> --}}
                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Unit Price</th>
                            <th class="product-stock w-lg-15">Stock Status</th>
                            <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($wishlists as $wishlist)
                      
                        <tr>
                            <!-- Remove Product from Wishlist -->
                            <td class="text-center">
                                <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-gray-32 font-size-26 p-0 m-0" onclick="return confirm('Are you sure you want to remove this item from your wishlist?');">
                                        &times;
                                    </button>
                                </form>
                                
                            </td>

                            <!-- Product Thumbnail -->
                            <td class="d-none d-md-table-cell">
                                <a href="#">
                                    <img class="img-fluid max-width-100 p-1 border border-color-1" src="../../assets/img/300X300/img6.jpg" alt="Image Description">
                                </a>
                            </td>

                            <!-- Product Name -->
                            <td data-title="Product">
                                <a href="#" class="text-gray-90">{{ $wishlist->product_name }}</a>
                            </td>

                            <!-- Unit Price -->
                            <td data-title="Unit Price">
                                <span>${{ $wishlist->sell_price }}</span>
                            </td>

                            <!-- Stock Status -->
                            <td data-title="Stock Status">
                                <span>{{ $wishlist->qty_available >= 1 ? 'In stock' : 'Out of stock' }}</span>
                            </td>

                            <!-- Add to Cart Button -->
                            <td>
                                <button type="button" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">
                                    Add to Cart
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Wishlist Table -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
