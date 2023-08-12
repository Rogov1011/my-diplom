<div class="popup-menu-catalog">
    <div class="popup_header">
        <img class="rounded-3" src="{{ asset('assets/icon/logo.png') }}" width="150px">
        <a href="" class="popup_close">
            X
        </a>
    </div>
    <div class="popup_content">
        <ul class="popup_content_spisok">
            @foreach ($categories as $category)
                <a class="text-decoration-none " href="{{ route("app.catalog-by-subCategories", $category) }}">
                    <li class="text-decoration-none text-light open-subcategory" data-id="{{ $category->id }}">{{ $category->name }}</li>
                </a>
            @endforeach

        </ul>
    </div>
</div>
