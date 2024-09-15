<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ImageHelper
{
    /**
     *
     *
     * @param int $max_width The desired width of the image.
     * @param int $max_height The desired height of the image.
     * @param string $uploadedImage The path to the uploaded image.
     * @param string $filename The filename to save the processed image as.
     * @return bool True if the image was processed successfully, false otherwise.
     */
    public static function resizeCropImages(UploadedFile $uploadedImage, $directory, $width = null, $height = null, $quality = 75): string
    {
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $manager = new ImageManager(new Driver());
        $image = $manager->make($uploadedImage);

        // Resize and crop the image only if width and height are provided
        if ($width && $height) {
            $image->fit($width, $height);
        }


        $image->save($directory . $filename, $quality);

        return $filename;
    }

    /**
     * Unlink (delete) an image from the server.
     *
     * @param string $filePath The path to the image file to be deleted.
     * @return bool True if the file was deleted successfully, false otherwise.
     */
    public static function unlinkImage($filePath): bool
    {
        if (File::exists($filePath)) {
            return unlink($filePath);
        }

        return false;
    }
}
