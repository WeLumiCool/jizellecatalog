<a href="{{ route('news/show', $new->id) }}" style="text-decoration: none;">
    <div class="mb-4 jzl-block news-block">
        <div style="overflow: hidden;">
        <img class="w-100" style="transition: 1.5s" src="{{ asset('storage/'.$new->image) }}" alt="">
        </div>
        <p class="mt-3 openSans font-size-12"
           style="color: #b8b8b8;">{{ \Jenssegers\Date\Date::parse($new->created_at)->format('j F Y г.')}}</p>
        <p class="mt-3 openSans font-size-20 jzl-title font-weight-light">{{ $new->title }}</p>
    </div>
</a>