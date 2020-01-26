@extends ('layout-simple');

@section ('content')
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">SimpleWork123</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="{{ Request::path() === '/simple' ? 'current_page_item' : '' }}"><a href="/simple" accesskey="1" title="">Homepage</a></li>
				<li class="{{ Request::path() === '/clients' ? 'current_page_item' : '' }}"><a href="#" accesskey="2" title="">Our Clients</a></li>
				<li class="{{ Request::path() === '/about' ? 'current_page_item' : '' }}"><a href="/about" accesskey="3" title="">About Us</a></li>
				<li class="{{ Request::path() === '/career' ? 'current_page_item' : '' }}"><a href="#" accesskey="4" title="">Careers</a></li>
				<li class="{{ Request::path() === '/contact' ? 'current_page_item' : '' }}"><a href="#" accesskey="5" title="">Contact Us</a></li>
			</ul>
		</div>
	</div>
	<div id="header-featured">
		<div id="banner-wrapper">
			<div id="banner" class="container">
				<h2>Maecenas luctus lectus!!!</h2>
				<p>This is <strong>SimpleWork</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
				<a href="#" class="button">Etiam posuere</a> </div>
		</div>
	</div>
</div>


@endsection
