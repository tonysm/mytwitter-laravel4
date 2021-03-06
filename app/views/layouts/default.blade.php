<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyTwitter with Laravel 4</title>
	{{ Html::style('css/bootstrap.css') }}
	{{ Html::style('css/flat-ui.css') }}
	{{ Html::style('css/app.css') }}
	@yield('styles')
</head>
<body>
	<header>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li>
								{{ Html::link('/', 'MyTwitter') }}
							</li>
							@if(!Auth::check())
							<li>
								<a href="#loginmodal" role="button" data-toggle="modal">Sign in</a>
							</li>
							@else
							<li>
								{{ Html::linkRoute('findusers', 'Connect') }}
							</li>
							@endif
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	</header>
	<div class="container main">
		@yield('content')
	</div>
	<footer class="container-fluid">
		<div class="row-fluid">
			<p class="span6 offset3">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, esse, optio cupiditate at deleniti tenetur eum facere a eveniet natus officia ut amet libero commodi nisi placeat nesciunt dignissimos deserunt.
			</p>
		</div>
	</footer>

	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('js/bootstrap.min.js') }}
	@yield('scripts')
</body>
</html>