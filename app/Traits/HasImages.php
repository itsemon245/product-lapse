<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasImages
{

    /**
     * For one to one relationship
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * For one to many relationship
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    /**
     * Define other required attributes
     */
    protected string $disk = 'public';
    protected string $baseDir = 'uploads';
    protected string $dir = '';
    protected ?string $imageableType = null;

    /**
     * Stores an Image to the defined directory in a polymorphic way
     * @param UploadedFile $image
     * @param ?string $name leave null for Original name
     */
    public function storeImage(UploadedFile $image, ?string $name = null): Image
    {
        $type = $this->imageableType ?? get_class($this);
        $id =  $this->id;
        $ext = $image->getClientOriginalExtension();
        $name = $name ?? $image->getClientOriginalName();
        $name = str($name)->slug() . uniqid() . $ext;
        $path = $image->storeAs($this->baseDir . "/" . $this->dir, $name, $this->disk);
        $image = Image::create([
            'imageable_id' => $id,
            'imageable_type' => $type,
            'path' => $path,
            'url' => asset('storage/' . $path),
            'mime_type' => $ext
        ]);

        return $image;
    }
    /**
     * Updates the old Image to the defined directory in a polymorphic way
     * @param UploadedFile $image
     * @param ?string $name
     * @param Image|null $oldImage keep null if eager loaded or not inside a loop
     */
    public function updateImage(UploadedFile $image, ?string $name = null, Image $oldImage = null ): Image
    {
        $oldImage = $oldImage ?? $this->image;
        $type = $this->imageableType ?? get_class($this);
        $id =  $this->id;
        $ext = $image->getClientOriginalExtension();
        $name = $name ?? $image->getClientOriginalName();
        $name = str($name)->slug() . uniqid() . $ext;
        $path = $image->storeAs($this->baseDir . "/" . $this->dir, $name, $this->disk);
        $this->deleteImage($oldImage, true);
        $image = tap($oldImage)->update([
            'imageable_id' => $id,
            'imageable_type' => $type,
            'path' => $path,
            'url' => asset('storage/' . $path),
            'mime_type' => $ext
        ]);
        return $image;
    }

    /**
     * Deletes an Image to the defined directory in a polymorphic way
     * @param Image $image keep null if eager loaded or not inside a loop
     * @param bool $fileOnly set true if you want the only file to be deleted
     */
    public function deleteImage(Image $image = null, ?bool $fileOnly = false): bool
    {
        if(Storage::disk($this->disk)->exists($image->path)){
            Storage::delete($image->path);
        }
        if ($fileOnly) {
            return true;
        }
        return $image->delete();
    }
}
