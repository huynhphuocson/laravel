<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="PSHuynh" />
    <link rel="stylesheet" href="{!! asset('public/qt64_admin/templates/css/style.css') !!}" />
	<title>Admin Area :: @yield('title')</title>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: Trang chính
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="">Trang chính</a> | <a href="">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="">Quản lý tin</a>
				</td>
				<td align="right">
					Xin chào {!! Auth::user()->username !!} | <a href="{!! url('logout') !!}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
		@include('admin.block.error')
		@include('admin.block.flash')
		@yield('content')
	</div>
    <div id="bottom">
        Copyright © 2016 by PSHuynh
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="{!! asset('public/qt64_admin/templates/js/myscript.js') !!}"></script>
</body>
</html>