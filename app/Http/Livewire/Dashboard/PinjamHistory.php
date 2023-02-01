<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Pinjaman;

class PinjamHistory extends Component
{
    public $typeName = ["Terlama", "Terbaru"];
    public $type = 0;

    public function setType($type)
    {
        $typeName = $this->typeName;
        if ($type == "next") {
            $this->type += 1;

            if ($this->type >= count($typeName)) {
                $this->type = 0;
            }
        } else {
            $this->type -= 1;

            if ($this->type < 0) {
                $this->type = (count($typeName) - 1);
            }
        }
        $this->render();
    }

    public function render()
    {
        $pinjams = Pinjaman::orderBy('created_at', 'asc');

        $type = $this->typeName[$this->type];        
        if ($type == "Terbaru") {
            $pinjams = Pinjaman::orderByDesc('created_at');
        }

        return view('livewire.dashboard.pinjam-history', [
            'pinjams' => $pinjams->limit(6)->get(),
        ]);
    }
}
