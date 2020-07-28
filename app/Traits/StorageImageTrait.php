<?php
namespace App\Traits;

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
            $dataTraitUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataTraitUpload;
        }
        return null;
    }
}

