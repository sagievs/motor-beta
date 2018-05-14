<div class="ssd">
    @foreach($mainArticles as $article)
    <div class="ssd1">
        <a href="{{ route('article', $article) }}">
            <div class="ssd1-img" style="background: url({{ Storage::url($article->thumbnail) }}) center; background-size: cover;"></div>
        </a>
        {{ $article->created_at->format('j '.$monthes[$article->created_at->month].' Y') }}<br>
        <div class="ssd-name"><a href="{{ route('article', $article) }}">{{ $article->title }}</a></div>
    </div>
    @endforeach
</div>