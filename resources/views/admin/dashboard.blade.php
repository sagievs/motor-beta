@extends('admin.layouts.master')
@section('title', 'Панель Управления')
@section('content')
	<div class="panel panel-headline">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-file-o"></i></span>
						<p>
							<span class="number">{{ $pages->count() }}</span>
							<span class="title">Страниц</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-thumb-tack"></i></span>
						<p>
							<span class="number">{{ $posts->count() }}</span>
							<span class="title">Статей</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-ticket"></i></span>
						<p>
							<span class="number">{{ $products->count() }}</span>
							<span class="title">Товаров</span>
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-tasks"></i></span>
						<p>
							<span class="number">{{ $categories->count() }}</span>
							<span class="title">Категории</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection