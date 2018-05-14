<div class="stat-block">
	<div class="stat-zag">Полезные статьи</div>
    @foreach($mainArticles as $article)
	<div class="stat">
        <div class="stat-date">{{ $article->created_at->format('j '.$monthes[$article->created_at->month].' Y') }}</div>
        <div class="stat-anons"><a href="{{ route('article', $article) }}">{{ $article->title }}</a></div>
    </div>
    @endforeach
</div>