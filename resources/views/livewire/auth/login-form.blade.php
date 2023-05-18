<form action="/login" method="POST">
    @csrf
    <div class="form-group my-3">
      <label for="email" class="ms-1 mb-1 text-m-regular">Email</label>
      <input type="email" wire:model.lazy='email' name="email" class="input-form input-form-md placeholder-m-m @error('email') is-invalid @enderror" placeholder="Masukkan Email Anda">
      @error('email')
      <div class="invalid-feedback" style="font-size: 12px;">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label for="password" class="ms-1 mb-1 text-m-regular">Password</label>
        <input type="password" wire:model.lazy='password' name="password" class="input-form input-form-md placeholder-m-m @error('password') is-invalid @enderror" placeholder="Masukkan Password Anda">
        @error('password')
        <div class="invalid-feedback" style="font-size: 12px;">
          {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="button button-success button-md w-100 mt-3 text-m-medium text-white" style="letter-spacing: .03em">Sign In</button>
    <hr class="my-4">
    <div class="text-s-regular text-neutral-70 text-center">
        Jika Belum Punya Akun Silahkan Buat <a href="/register" class="text-decoration-none">Disini!!</a>
    </div>
</form>

<x-toast />