<script defer src="{{ asset('vendor/alpinejs/alpine.min.js') }}"></script>
<script src="{{ asset('vendor/sweetAlert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('vendor/autoCompleteJs/autoComplete.min.js') }}"></script>

<script type="text/javascript">
  let menu = document.querySelectorAll('.sidebar-menu .menu');
  
  const loader  = document.querySelector('#loader');
  setTimeout(() => {    
    loader.style.display = 'none';
  }, 2500);
</script>

<script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="{{ asset('vendor/toastify/toastify.min.js') }}"></script>