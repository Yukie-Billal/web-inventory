<div class="card flex-fill border-0">
    <div class="card-header border-0 bg-white px-1 mb-1">
        <div class="row px-2 mb-3">
            <div class="col-12 p-0 header-s">
                Data - Data Users
            </div>
        </div>
        <div class="row justify-content-end align-items-center">
            <div class="col-3">

            </div>
            <livewire:pagination-view :col='9' :page='$page' :pageCount='$pageCount' :pageName='$pageName' />
        </div>
    </div>
    <div class="card-body p-0">
        <div class="col-12 p-0 border rounded border-neutral-40-2">
            <table class="table table-hover table-responsive mb-0">
                <thead class="">
                    <tr>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>No Telephone</th>
                        <th>Alamat</th>
                        <th>Role</th>
                        <th style="min-width: 50px; max-width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() <= 0)
                        <tr class="text-center">
                            <td colspan="6" style="font-size: 16px">User Kosong</td>
                        </tr>
                    @else                        
                    @foreach ($users as $user)                    
                    <tr class="">
                        <td class="px-3 py-2">
                            {{ $user->nama }}
                        </td>
                        <td class="px-2 py-2">{{ $user->email }}</td>
                        <td class="px-2 py-2">{{ $user->no_tlp }}</td>
                        <td class="px-2 py-2">{{ $user->alamat }}</td>
                        <td class="px-2 py-2">{{ $user->role->nama_role }}</td>
                        <td style="max-width: 50px;">
                            <img src="{{ asset('icon/edit.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='getUser({{ $user->id }})' data-bs-toggle="modal" data-bs-target="#modalEditUser" class="mx-2">
                            <img src="{{ asset('icon/delete.png') }}" alt=".." style="height: 18px; width: 18px; cursor: pointer;" wire:click='confirmDelete({{ $user->id }})'>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>