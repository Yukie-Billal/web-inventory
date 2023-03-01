<div class="card flex-fill border-0">
    <div class="card-header border-0 p-3">                  
        <div class="row justify-content-between">
            <div class="col-9 d-flex align-items-center ps-4" style="gap: 3px;">
                @if (auth()->user()->foto)
                    @php
                        $ukuran = "50px";
                        $edit ? $ukuran = "70px" : '';
                    @endphp
                    <div class="img-fluid rounded-circle me-2" style="overflow: hidden; width: {{ $ukuran }};">
                        <img src="{{ asset('storage/'. auth()->user()->foto) }}" alt="P" style="height: 50px; width: 50px; object-fit: cover;">
                    </div>
                @else            
                    <i class="fa fa-user d-flex align-items-center me-2 mb-1" aria-hidden="true" style="font-size: 28px;"></i>
                @endif
                @if ($edit)
                    <span class="button button-info button-sm text-s-medium px-2 me-1" style="width: 20%;" data-bs-toggle="modal" data-bs-target="#modalUploadFoto">Ubah Foto</span>
                    <input type="text" wire:model.lazy='nama' class="input-form border-0 border-neutral-40-1">
                @else
                    <span class="text-l-medium">{{ $nama }}</span>
                @endif
            </div>
            <div class="col-3 d-flex justify-content-end align-items-center" style="gap: 3px;">
                @if ($user->id == auth()->user()->id)
                    @if ($edit)
                        <button class="button button-success" wire:click="updateProfile">Simpan</button>
                        <button class="button button-danger" wire:click="$set('edit',false)">Batal</button>
                    @else
                        <button class="button button-info" wire:click="$toggle('edit')">Edit Profile</button>                
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="card-body border-0 p-3">
        <div class="col-12" style="min-width: none;">
            <table class="table table-responsive table-hover table-striped align-middle text-m-medium">
                <tbody>
                    <tr>
                        <td>Email</td>
                        <td>
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                    {{ $email }}
                                @if ($user->id == auth()->user()->id)
                                    <button class="button button-info button-sm">Reset email</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                {{ $password }}
                                @if ($user->id == auth()->user()->id)
                                    <button class="button button-info button-sm">Reset password</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @if ($edit)
                        <tr>
                            <td>No Telephone</td>
                            <td>
                                <input type="text" wire:model.lazy='no_tlp' class="input-form border-0 border-neutral-40-1">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <textarea wire:model.lazy='alamat' id="" rows="2" class="input-form border-0 border-neutral-40-1" style="height: auto;"></textarea>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>No Telephone</td>
                            <td>{{ $no_tlp }}</td>
                        </tr>   
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $alamat }}</td>
                        </tr>
                    @endif
                        <tr>
                            <td>Role</td>
                            <td>{{$user->role->nama_role }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
        <button class="button button-primary" onclick="history.back()">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </button>
    </div>
</div>

<div class="modal fade" id="modalUploadFoto">
    <div class="modal-dialog">
        <div class="modal-content rounded-1" style="width: 627px; padding:20px;">
            <livewire:auth.foto-profile-upload :userId="$user->id" />
        </div>
    </div>
</div>