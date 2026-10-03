@props(['name', 'category', 'price', 'tone' => 'coffee', 'compact' => false, 'id' => null])
<button type="button" class="menu-product-card" data-product-id="{{ $id }}" data-product-name="{{ $name }}" data-product-price="{{ $price }}" data-product-category="{{ $category }}">
    <span @class(['product-art', 'art-matcha' => $tone === 'matcha', 'art-tea' => $tone === 'tea', 'art-food' => $tone === 'food', 'art-dessert' => $tone === 'dessert', 'art-choco' => $tone === 'choco'])>
        @if($tone === 'food' || $tone === 'dessert') <x-icon name="bag" /> @else <x-icon name="coffee" /> @endif
    </span>
    <span class="product-details">
        <strong>{{ $name }}</strong>
        <small>{{ $category }}</small>
        <b>{{ 'Rp '.number_format($price, 0, ',', '.') }}</b>
    </span>
</button>
