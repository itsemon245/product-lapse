<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\UploadedFile;
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

    // Add relevant methods that you want to reuse
    /**
     * Stores an Image to the defined directory in a polymorphic way
     * @param ?string $name leave null for Original name
     * @param string $dir directory name after baseDirectory
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
}
