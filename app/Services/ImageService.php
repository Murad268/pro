<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageService
{



    public function downloadFile($request, $path, $model)
    {
        foreach ($request->file() as $key => $file) {
            $extension = $file->getClientOriginalExtension();
            $randomName = Str::random(10);
            $lastPath =  $path . $randomName . "." . $extension;

            try {
                $file->storeAs($path, $randomName . "." . $extension, 'public');

                // Get the directory path
                $directoryPath = pathinfo($lastPath, PATHINFO_DIRNAME);

                // Set directory permissions to 755
                chmod('storage/' . $directoryPath, 0755);

                $model->update([$key =>  $lastPath]);
            } catch (\Exception $e) {
                dd($e->getMessage());
                return false;
            }
        }

        return true;
    }




    // public function deleteImage($model, $files, $path)
    // {
    //     foreach ($files as $key => $file) {
    // if (file_exists($model->$key)) {
    //     unlink($model->$key);
    // };
    //         Storage::disk('public')->delete($file);
    //     }
    // }

    public function deleteImage($model, $files, $path)
    {

        foreach ($files as $key => $file) {
            if ($file) {

                if (Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                } else {
                }
            }
        }
    }
}
