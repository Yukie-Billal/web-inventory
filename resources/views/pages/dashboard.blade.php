<x-app-layout title="Home">

	@can('IsAdmin')
		<livewire:dashboard.admin-dashboard />
	@endcan

	@can('IsUser')
		<livewire:dashboard.user-dashboard />
	@endcan

	{{-- @foreach ($cities as $city)
		<div class="card-columns">
			<div class="card">
				<img class="card-img-top" src="holder.js/100x180/" alt="">
				<div class="card-body">
					<h4 class="card-title">{{ $city->city_name }}</h4>
					<p class="card-text">Text</p>
				</div>
			</div>
		</div>
	@endforeach --}}

</x-app-layout>