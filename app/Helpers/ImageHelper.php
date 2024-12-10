<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ImageHelper
{
    /**
     * Resize and crop an image.
     *
     * @param int $max_width The desired width of the image.
     * @param int $max_height The desired height of the image.
     * @param string $uploadedImage The path to the uploaded image.
     * @param string $filename The filename to save the processed image as.
     * @return bool True if the image was processed successfully, false otherwise.
     */
    public static function resizeCropImages($max_width, $max_height, UploadedFile $uploadedImage, $directory): string
    {

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        $filename = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $image = $manager->read($uploadedImage);
        $imgSize = getimagesize($uploadedImage);
        // $width = $imgSize[0];
        // $width = $imgSize[1];
        $image->save($directory . $filename);
        return $filename;
    }
    function deleteOldImage($directory, $filename)
    {
        $imagePath = $directory . '/' . $filename;
        if ($filename && file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
