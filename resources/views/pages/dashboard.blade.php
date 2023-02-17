<x-app-layout title="Home">

	@can('IsAdmin')
		<livewire:dashboard.admin-dashboard />
	@endcan

	@can('IsUser')
		<livewire:dashboard.user-dashboard />
	@endcan

	
</x-app-layout>