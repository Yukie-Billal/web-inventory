<div class="card flex-fill m-0 rounded bg-white mt-4 p-3 my-shadow-2">
    <div class="card-header bg-white header-s mb-3 p-2">
        History / Barang Yang Di Sedang Dinjam
    </div>
    <div class="card-body p-0 border-0 ">
        <table class="table table-hover mb-0 w-100 h-100 align-middle">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Merek</th>
                    <th>Warna</th>
                    <th>Kategori</th>
                    <th class="text-center">Status</th>
                    <th></th>
                    {{-- <th style="min-width: 10px;"></th> --}}
                </tr>
            </thead>
            <tbody wire:poll.visible.3000ms>
                @if ($permintaans->count() == 0)
                <tr class="text-center">
                    <td colspan="8" style="font-size: 16px;">Kosong</td>
                </tr>
                @else
                @foreach ($permintaans as $permintaan)
                    <tr>
                        <td>{{ $permintaan->barang->nama_barang }}</td>
                        <td>{{ $permintaan->barang->merek }}</td>
                        <td>{{ $permintaan->barang->warna }}</td>
                        <td>{{ $permintaan->barang->kategori->nama_kategori }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @php
                                    $permintaan->status == "Di Tolak" ? $warna="danger" : $warna="success";
                                    $permintaan->status == 'Di Ajukan' ? $warna = "primary" : '';
                                @endphp
                                <div class="tags tags-{{ $warna }} px-0 w-75">{{ $permintaan->status }}</div>
                                <i class="ms-2 indicator-{{ $permintaan->read ? 'read' : 'unread' }}"></i>
                            </div>
                        </td>
                        <td
                            x-data="{
                                open: false,
                                toggle() {
                                    if (this.open) {
                                        return this.close()
                                    }
                    
                                    this.$refs.button.focus()
                    
                                    this.open = true
                                },
                                close(focusAfter) {
                                    if (! this.open) return
                    
                                    this.open = false
                    
                                    focusAfter && focusAfter.focus()
                                }
                            }"
                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']"
                        >
                            <div 
                                class="button button-info px-1"
                                x-ref="button"
                                x-on:click="toggle()"
                                :aria-expanded="open"
                                :aria-controls="$id('dropdown-button')"
                            >
                                <i class="fa-solid fa-ellipsis-vertical"></i>                                
                            </div>
                            <div
                                x-ref="panel"
                                x-show="open"
                                x-transition.origin.top.left
                                x-on:click.outside="close($refs.button)"
                                :id="$id('dropdown-button')"
                                style="display: none; position: absolute; width: 170px;"
                                class="mt-2 rounded-md bg-white rounded my-shadow-2 text-m-medium py-2 px-4 ps-0"
                            >
                                <a wire:click='deleteConfirm({{ $permintaan->id }})' class="px-4 py-2 text-sm cursor-pointer">
                                    <span class="text-danger">Hapus</span>
                                </a>
                                <a wire:click="tandaiSelesai({{ $permintaan->id }})" class="px-4 py-2 text-sm cursor-pointer">
                                    Tandai Diambil
                                </a>                    
                                {{-- <a href="#" class="px-4 py-2 text-sm">
                                    Edit Task
                                </a> --}}
                    
                            </div>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>                        
    </div>
</div>