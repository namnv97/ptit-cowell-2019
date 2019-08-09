<div class="container">
	<a href="{{route('home')}}" class="hidden-lg hidden-md">
		<img src="{{$logo}}" alt="Cowell">
	</a>
	<i class="close-menu fa fa-times"></i>
	<div class="main-menu">
		<ul class="menu-main-menu clearfix">
			<li class="{{request()->is('/')?'active':FALSE}}">
				<a href="{{route('home')}}"><i class="fa fa-home"></i></a>
			</li>
			@if(!empty($menus))
			@foreach($menus as $menu)
			@php
			$pac = null;
			$chc = null;
			@endphp
			@if(request()->is('category/'.$menu['menu']->slug))
			@php
			$pac = 'active';
			@endphp
			@endif
			@if(isset($menu['sub_menu']))
			@foreach($menu['sub_menu'] as $mn)
			@if(request()->is('category/'.$mn->slug))
			@php
			$chc = 'active';
			@endphp
			@endif
			@endforeach
			@endif
			<li class="{{(isset($menu['sub_menu']))?'menu-item-has-children':FALSE}}  {{(!empty($chc)?$chc:(!empty($pac)?$pac:FALSE))}}">
				<a href="{{route('client.category',['slug'=>$menu['menu']->slug])}}">{{$menu['menu']->name}}</a>
				@if(isset($menu['sub_menu']))
				<ul class="sub-menu">
					@foreach($menu['sub_menu'] as $mn)
					<li class="{{request()->is('category/'.$mn->slug)?'active':FALSE}}">
						<a href="{{route('client.category',['slug'=>$mn->slug])}}">{{$mn->name}}</a>
					</li>
					@endforeach
				</ul>
				@endif
			</li>
			@endforeach
			@endif
			<li class="shopping-cart {{request()->is('cart')?'active':FALSE}}">
				<a href="{{route('cart.index')}}">
					<i class="fa fa-shopping-cart"></i>
				</a>
			</li>
		</ul>
	</div>
</div>