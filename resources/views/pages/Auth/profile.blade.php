<x-app-layout>
	<div class="row mt-4 justify-content-center">
		<div class="col-8">
			<livewire:auth.profile :user="$user" :userId="$user->id" :key="$user->id"/>
		</div>
	</div>

	<x-toast />
	<x-alert.sweet-alert />
</x-app-layout>