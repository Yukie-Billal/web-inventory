<x-app-layout>
	<div class="row mt-4 justify-content-center">
		<div class="col-8">
			<div class="card flex-fill border-0">
				<div class="card-header border-0 p-3">					
					<div class="row justify-content-between">
						<div class="col-6 d-flex align-items-center ps-4" style="gap: 3px;">
							<i class="fa fa-user d-flex align-items-center me-2 mb-1" aria-hidden="true" style="font-size: 28px;"></i>
							<span class="text-l-medium">{{ auth()->user()->nama }}</span>
						</div>
						<div class="col-6 d-flex justify-content-end">
							<button class="button button-info" onclick="Livewire.emit('toastify',['success','Toast Man', 3500]);">Edit Profile</button>
						</div>
					</div>
				</div>
				<div class="card-body border-0 p-3">
					<div class="col-12" style="min-width: none;">						
						<table class="table table-responsive table-hover table-striped align-middle text-m-medium">
							<tbody>
								<tr>
									<td>Email </td>
									<td>{{ auth()->user()->email }}</td>
								</tr>
								<tr>
									<td>Password</td>
									<td>{{ auth()->user()->password }}</td>
								</tr>
								<tr>
									<td>No Telephone</td>
									<td>{{ auth()->user()->no_tlp }}</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>{{ auth()->user()->alamat }}</td>
								</tr>
								<tr>
									<td>Role</td>
									<td>{{ auth()->user()->role->nama_role }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<x-toast />
	<x-alert.sweet-alert />
</x-app-layout>