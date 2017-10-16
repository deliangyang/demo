<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function upload(Request $request)
    {
        $output = [];
        if ($request->isMethod('POST')) {
            $file = $request->file('test');
            if ($file->isValid()) {

                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = date('Y/m/d/') . date('His') . md5( uniqid() . rand(1000, 9999)) . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）

                $storage = $request->test->storeAs('krc', $filename, 'uploads');
                $output = [
                    'path' => '/uploads/' . $storage,
                    'original_name' => $originalName,
                    'type' => $type,
                ];
            }
        }

        return \Response::json($output);
    }
}
