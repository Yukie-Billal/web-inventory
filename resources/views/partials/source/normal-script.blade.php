<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
  let menu = document.querySelectorAll('.sidebar-menu .menu');
  // function myFunction() {
  //     menu.forEach((item) => {
  //         const sidebarMenuItem = item.parentNode;
  //         const subMenuItem = sidebarMenuItem.querySelector('.sub-menu');
  //         if(subMenuItem != null) {
  //             subMenuItem.classList.add('hide');
  //         }
  //     });
  //     const sidebarMenu = this.parentNode;
  //     const subMenu = sidebarMenu.querySelector('.sub-menu');
  //     // setTimeout(() => {
  //         if(subMenu != null) {
  //             subMenu.classList.toggle('hide');
  //             subMenu.classList.toggle('show');
  //         }
  //     // }, 300);
  // }
  // menu.forEach((item) => {
  //     item.addEventListener('click', myFunction);
  // });

  const loader  = document.querySelector('#loader');
  setTimeout(() => {    
    loader.style.display = 'none';
  }, 2500);
</script>

<script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

