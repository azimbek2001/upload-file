<?php

namespace App\Services;

use App\Models\FileUpload;
use App\Services\Interfaces\MediaConfigInterface;
use Config;
use Intervention\Image\Facades\Image;

class CreateFileUploadService
{
    /**
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $disk
     * @param MediaConfigInterface $config
     */
    public function add(\Illuminate\Http\UploadedFile $file, $disk, MediaConfigInterface $config)
    {
        $file_path = Config::get('fileupload.path');
        $path = $file->store($file_path);
        $sizes = $config->getSizes();
        $thumbs = [];

        foreach ($sizes as $size){
            [ 'filename' => $filename,'basename' => $basename, 'dirname' => $dirname ,'extension' => $extension]  = pathinfo($path);
            $image = Image::make($file);
            $filename = $size ."-" . $filename;
            $image_path = storage_path('app/' . $file_path);

            $image->resize(null, $size, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save($image_path . $filename . "." . $extension);

            $thumbs["{$size}"] = $filename;
        }

        FileUpload::create([
            'client_name' => $file->getClientOriginalName(),
            'original_name' => $path,
            'disk' => $disk,
            'mime_type' => $file->getMimeType(),
            'thumbs' => json_encode($thumbs),
            'entity_type' => $config->getEntityType(),
            'entity_id' => $config->getEntityId(),
        ]);
    }
}
