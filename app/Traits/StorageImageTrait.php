<?php
namespace App\Traits;

use App\Models\Image_product;
use Storage;
use Illuminate\Support\Str;

trait StorageImageTrait
{
    public function StorageTraitUpload ($request, $fieldName, $folderName){
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName. '/' .auth()->id(), $fileNameHash);
//            dd($filePath);
            $dataTraitUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataTraitUpload;
        }
        return null;
    }
    public function multipleUploadProduct ($request, $fieldName, $folderName, $product){
        if ($request->hasFile($fieldName)) {
            foreach ($request->$fieldName as $file) {
                $fileNameHash = str::random(10) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
//                dd($filePath);
                Image_product::create([
                    'image_path' => \Illuminate\Support\Facades\Storage::url($filePath),
                    'id_product' => $product->id
                ]);
            }
        }
        return null;
    }
}

