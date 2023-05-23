<?php

namespace App\Traits;

trait commonTrait {

    function adminFile($file,$data = null)
    {
        if(!empty($data))
        {
            return view('admin/pages/'.$file)->with($data);
        }
        else
        {
            return view('admin/pages/'.$file);
        }
    }

}