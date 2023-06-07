<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFile
{
    public function removeFile($call_name)
    {
//        if($oldFile != null)
//        {
            Storage::delete("public/" . "/" . $this->getOriginal($call_name));
//        }
    }

    public function upload_file($file, $call_name = 'file', $folder = null, $name = null)
    {
        if($file == null) { return; }

        $this->removeFile($call_name);

        $folder = $folder != null
            ? $folder
            : now()->format('MY');

        $file_name = $name != null
            ? $name . '.' . $file->getClientOriginalExtension()
            : Str::random(10) . '.' . $file->getClientOriginalExtension();
//        dd($folder,$file_name);
        $file->storeAs("public/$folder", $file_name);
        $this->file = $folder . '/' . $file_name;

        return $this;
    }

    public function getFile($call_name = 'file') // вывод картинки
    {
        $get_file = Storage::exists('/public/' . $this->$call_name)
            ? Storage::url($this->$call_name)
            : null;
        return $get_file;
    }
}
