<aside class="menu">
    <p class="menu-label">Categories</p>
    <ul class="menu-list">
        @foreach ($categories as $category)
        <li>
            <a href="{{ route('frontend.product.by.category', $category) }}">{{ $category->name }}
                <span class="tag is-link">{{ $category->products->count() }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</aside>
