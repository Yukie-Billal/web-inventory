<x-app-layout>
	<x-breadcrumb parent='Data' where='Supplier & User' />
    <div class="col-11 p-2">
    	<livewire:supplier.supplier-index>
    </div>
    <hr class="text-neutral-60 my-5">
    <div class="col-12 p-2">
        <livewire:user.user-index />
    </div>

    <div class="modal fade" id="modalEditSupplier">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
                <livewire:supplier.supplier-edit />
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditUser">
        <div class="modal-dialog">
            <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
                <livewire:user.user-edit />
            </div>
        </div>
    </div>
</x-app-layout>