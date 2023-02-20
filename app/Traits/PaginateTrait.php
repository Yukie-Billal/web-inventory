<?php

namespace App\Traits ;

/**
 * 
 */
trait PaginateTrait
{
    public function countPage($datas)
    {
        $sisa = $datas % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($datas - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->pageCount = 1;
        }        
        return $count;
    }
}


?>