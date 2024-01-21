<?php

namespace App\Services;

class SimpleService
{
    public function __construct(private ImageService $imageService)
    {
    }

    public function simple_create($model, $request)
    {

        $created = $model->create($request->all());
        if ($created) {
            return $created;
        } else {
            return false;
        }
    }


    public function simple_create_with_img($model, $request, $path)
    {


        $created = $model->create($request->all());
        if ($created) {
            if ($this->imageService->downloadFile($request, $path, $created)) {
                return $created;
            }
        } else {
            return false;
        }
    }



    public function simple_update($model, $request)
    {
        $updated = $model->update($request->all());
        if ($updated) {
            return $updated;
        } else {
            return false;
        }
    }





    public function simple_update_with_img($model, $request, $array, $path)
    {
        $this->imageService->deleteImage($model, $array, $path);

        $this->simple_update($model, $request);
        return $this->imageService->downloadFile($request, $path, $model);
    }



    public function simple_delete($model)
    {
        $deleted = $model->delete();
        if ($deleted) {
            return true;
        } else {
            return false;
        }
    }


    public function simple_delete_with_img($model, $array, $path)
    {
        $this->imageService->deleteImage($model, $array, $path);
        return $this->simple_delete($model);
    }
}
