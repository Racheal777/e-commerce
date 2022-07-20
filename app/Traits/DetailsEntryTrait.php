<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;

trait DetailsEntryTrait 
{
    use ImageUploadTrait;

    public function detailsEntry(Request $request, $model)
    {
        //$dress = new Dresses();

        $model->name = $request->input('name');
        $model->price = $request->input('price');
        $model->size = $request->input('size');
        $model->image = Storage::url($this->imageUpload($request));

        $model->save();

        return $model;
    }
}