<x-app-layout>
	<div class="row">
		<div class="col-8">
			<div class="card flex-fill border-0">
				<div class="card-body border-0 p-0">
					{{ auth()->user()->nama }}
				</div>
			</div>
		</div>
	</div>
</x-app-layout>