<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function upload(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file('file');
            if ($file->isValid()) {

                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = date('Y-m-d/His') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = \Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            }
        }
    }
}
