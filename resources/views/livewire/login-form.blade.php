<form action="/login/act" method="POST">
    @csrf
    {{-- <div class="form-group">
      <label for="nama" class="ms-1 mb-1">Nama</label>
      <input type="text" wire:model.defer='nama' name="nama" class="form-control" placeholder="Masukkan Nama Anda">
    </div> --}}
    <div class="form-group my-3">
      <label for="email" class="ms-1 mb-1">Email</label>
      <input type="email" wire:model.lazy='email' name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Anda">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label for="password" class="ms-1 mb-1">Password</label>
        <input type="password" wire:model.lazy='password' name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password Anda">
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div>
    {{-- <button type="submit" class="btn w-100 mt-3 fs-6 fw-bold" style="letter-spacing: .03em" style="background-color: #43936C">Sign In</button> --}}
    <button type="submit" class="btn btn-success w-100 mt-3 fs-6 fw-bold" style="letter-spacing: .03em">Sign In</button>
    <hr>
    <div class="form-text text-center" style="font-size: 12px">
        Jika Belum Punya Akun Silahkan Buat <a href="#" class="text-decoration-none">Disini!!</a>
    </div>
</form>