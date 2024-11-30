<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Upload files to storage
     *
     * @param $files
     * @return path files
     */
    public function uploadFile($files, $newFolder = null)
    {
        // Kiểm tra nếu $files là mảng (nhiều file)
        if (is_array($files)) {
            $paths = [];
            foreach ($files as $file) {
                // Gọi hàm xử lý từng file
                $paths[] = $this->processSingleFile($file, $newFolder);
            }
            return $paths; // Trả về mảng đường dẫn của các file
        }

        // Nếu chỉ là một file
        return $this->processSingleFile($files, $newFolder);
    }

    private function processSingleFile($file, $newFolder = null)
    {
        if (!$file) {
            return '';
        }

        $imageName = $file->getClientOriginalName();
        $filename = explode('.', $imageName)[0];
        $extension = $file->getClientOriginalExtension();
        $picName = Str::slug(time() . "_" . $filename, "_") . "." . $extension;
        $folder = $newFolder ? 'uploads/' . $newFolder : 'uploads';
        $path = $file->storeAs($folder, $picName, 'public');

        return asset("storage") . '/' . $path;
    }


}
