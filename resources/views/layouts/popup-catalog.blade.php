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
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
