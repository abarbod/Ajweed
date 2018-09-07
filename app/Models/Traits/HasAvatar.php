<?php


namespace App\Models\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @property string $avatar
 */
trait HasAvatar
{

    protected $saveImageAs = 'jpg';

    /**
     * Register model event listeners when the model is booted.
     */
    public static function bootHasAvatar()
    {
        // if the user uploaded new image, we delete the old image.
        self::saved(function (self $model) {
            $model->deleteOriginalImage();
        });

        // When the user is deleted, we delete the image.
        self::deleted(function (self $model) {
            $model->deleteImage();
        });
    }

    /**
     * Store a new uploaded image and set the avatar to the new path.
     * This method will not update the database
     * save or update method should be called after calling this method.
     *
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     */
    public function storeAvatar(UploadedFile $uploadedFile)
    {
        try {
            // Create Intervention Image.
            /** @var \Intervention\Image\Image $image */
            $image = Image::make($uploadedFile);

            // Resize the image to 300x300 and convert it to jpg.
            $image = (string)$image->orientate()
                                   ->fit(300)
                                   ->encode($this->saveImageAs);

            // Store the modified image in the public disk (storage/app/public/avatars).
            // and update the avatar attribute with the new file path.
            $newPath = $this->avatarsPath() . $fileName = $this->hashName();
            Storage::disk('public')->put($newPath, $image);

            // Store the original uploaded image for debugging later in (storage/app/original-avatars).
            $uploadedFile->storeAs('original-' . $this->avatarsPath(), $fileName);

            $this->avatar = $newPath;

        } catch (\Exception $exception) {
            Log::error("Store Avatar Failed: " . $exception->getMessage(), ['user_id' => $this->getKey()]);
        }
    }

    /**
     * Get the user avatar url link.
     *
     *
     * @param int $size in pixels of the image returned by gravatar (anywhere from 1px up to 2048px).
     *
     * @link https://en.gravatar.com/site/implement/images/
     *
     * @return string Url to the image.
     */
    public function avatarUrl($size = 300)
    {
        // If the user has an image on the server we return a public link.
        if ($this->hasImage()) {
            return Storage::disk('public')->url($this->avatar);
        };

        // if no image on server, we look for an image from Gravatar
        // which will return a default image if the user is not registered with Gravatar.
        return sprintf('https://www.gravatar.com/avatar/%s?d=%s&s=%s',
            md5(strtolower(trim($this->email))),
            'mm',
            $size
        );
    }

    /**
     * Does the user has uploaded an image to our server.
     *
     * @return bool
     */
    protected function hasImage()
    {
        return Storage::disk('public')->exists(data_get($this, 'avatar'));
    }


    /**
     * Generate a hashed name with timestamp and extension for new images.
     *
     * @return string filename
     */
    protected function hashName()
    {
        return time() . '-' . str_random(40) . '.' . $this->saveImageAs;
    }

    /**
     * Get the path to store images.
     *
     * @return string
     */
    protected function avatarsPath()
    {
        return 'avatars' . DIRECTORY_SEPARATOR;
    }

    /**
     * Delete the current image file.
     */
    protected function deleteImage()
    {
        if ($this->hasImage()) {
            Storage::disk('public')->delete($this->avatar);
        }
    }

    /**
     * Delete the original image file if the new avatar value is different.
     */
    protected function deleteOriginalImage()
    {
        if (! $this->originalIsEquivalent('avatar', $this->avatar)) {
            Storage::disk('public')->delete($this->getOriginal('avatar'));
        }
    }

}
