<table class="table table-hover table-responsive">
   <thead class="border-neutral-40">
      <tr>
         <th>Nama Barang</th>
         <th>Merek</th> 
         <th>Warna</th>
         <th>Kategori</th>
         <th>Satuan</th>
         <th style="min-width: 50px;"></th>
      </tr>
   </thead>
   <tbody>
      {{-- @foreach ($barangs as $barang )  --}}
         <tr>
            <td>Laptop asus</td>
            <td>Asus</td>
            <td>Hitam</td>
            <td>Elektronik</td>
            <td>Pcs</td>
            <td>Pcs</td>
         </tr>
         <tr>
            <td>Laptop asus</td>
            <td>Asus</td>
            <td>Hitam</td>
            <td>Elektronik</td>
            <td>Pcs</td>
            <td>
               <i class="fa fa-search"></i>
            </td>
         </tr>
      {{-- @endforeach --}}
   </tbody>
</table>