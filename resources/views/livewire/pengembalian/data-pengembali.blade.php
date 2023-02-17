<div class="card flex-fill border-0">
  <div class="card-header bg-white border-0 d-flex flex-column">
      <span class="header-m mb-2">Data Pengembali</span>
      <p class="text-m-medium">Harap mengisi data dibawah ini sebelum mengkonfirmasi !!!</p>
  </div>
  <div class="card-body">
      <div class="row">
          <div class="col-6">
              <div class="form-group">
                  <label for="pengembali">Nama Pengembali</label>
                  <select class="select-form select-lg" wire:change='$emit("getPengembali")' id="pengembali">
                     @if ($pinjamans->count() <= 0)
                        <option selected>-- Tidak Ada Pinjaman --</option>
                     @else
                        <option selected disabled>-- Pilih Nama Peminjam --</option>
                        @foreach ($pinjamans as $pinjam)
                           <option value="{{ $pinjam->nama_peminjam }}">{{ $pinjam->nama_peminjam }}</option>
                        @endforeach
                     @endif
                  </select>
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
                  <label for="namaLengkap" class="text-m-regular">Lama Pinjam</label>
                  <input type="text" wire:model.lazy='lama' id="namaLengkap" class="input-form w-100 placeholder-m-m input-form-lg" placeholder="5 Hari">
              </div>
          </div>
      </div>
      <div class="row justify-content-end mt-3">
          <div class="col-2">
              <button class="button button-success text-white" wire:click='submitPengembalian'>
                  <i class="fa fa-clipboard me-1" aria-hidden="true"></i>
                  Konfirmasi
              </button>
          </div>
      </div>
  </div>
</div>

@push('scripts')
   <script>
      Livewire.on('getPengembali', function () {
         const value = document.querySelector('#pengembali').value;
         const params = ['pengembali', value];
         Livewire.emit('setPengembali', params);
      });
      Livewire.on('addedPengembalian', function () {
         document.querySelector('#pengembali').value = "";
      })
   </script>
@endpush