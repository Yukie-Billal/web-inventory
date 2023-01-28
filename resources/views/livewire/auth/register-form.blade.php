{{-- <form action="/register" method="POST"> --}}
<form wire:submit.prevent='register'>
    <div class="form-group my-3">
      <label for="nama" class="ms-1 mb-1 text-m-regular">Nama</label>
      <input type="text" wire:model.lazy='nama' name="nama" class="input-form input-form-md placeholder-m-r @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Anda">
      @error('nama')
      <div class="invalid-feedback text-s-regular">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group my-3">
      <label for="email" class="ms-1 mb-1 text-m-regular">Email</label>
      <input type="email" wire:model.lazy='email' name="email" class="input-form input-form-md placeholder-m-r @error('email') is-invalid @enderror" placeholder="Masukkan Email Anda">
      @error('email')
      <div class="invalid-feedback text-s-regular">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group my-3">
        <label for="password" class="ms-1 mb-1 text-m-regular">Password</label>
        <input type="password" wire:model.lazy='password' name="password" class="input-form input-form-md placeholder-m-r @error('password') is-invalid @enderror" placeholder="Masukkan Password Anda">
        @error('password')
        <div class="invalid-feedback text-s-regular">
          {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="confirmPassword" class="ms-1 mb-1 text-m-regular">Konfirmasi Password</label>
        <input type="confirmPassword" wire:model.lazy='confirmPassword' name="confirmPassword" class="input-form input-form-md placeholder-m-r @error('confirmPassword') is-invalid @enderror" placeholder="Konfirmasi Password Anda">
        @error('confirmPassword')
        <div class="invalid-feedback text-s-regular">
          {{ $message }}
        </div>
        @enderror
    </div>
    {{-- <button type="submit" class="btn w-100 mt-3 fs-6 fw-bold" style="letter-spacing: .03em" style="background-color: #43936C">Sign In</button> --}}
    <button type="submit" class="button button-success w-100 mt-3 button-md text-m-medium text-white">Sign In</button>
    <hr>
    <div class="text-s-regular text-neutral-70 text-center">
        Jika Sudah Punya Akun Silahkan Login <a href="/" class="text-decoration-none">Disini!!</a>
    </div>
</form>