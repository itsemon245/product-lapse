<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFile
{

    /**
     * For one to one relationship
     */
    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'imageable');
    }

    /**
     * For one to many relationship
     */
    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
    /**
     * Define other required attributes
     */
    protected string $disk = 'public';
    protected string $baseDir = 'uploads';
    protected string $dir = '';
    protected ?string $fileableType = null;

    /**
     * Stores an Image to the defined directory in a polymorphic way
     * @param UploadedFile $file
     * @param ?string $name leave null for Original name
     */
    public function storeFile(UploadedFile $file, ?string $name = null): File
    {
        $type = $this->fileableType ?? get_class($this);
        $id = $this->id;
        $ext = $file->getClientOriginalExtension();
        $name = $name ?? $file->getClientOriginalName();
        $name = str($name)->slug() . uniqid() . $ext;
        $path = $file->storeAs($this->baseDir . "/" . $this->dir, $name, $this->disk);
        $file = File::create([
            'fileable_id' => $id,
            'fileable_type' => $type,
            'path' => $path,
            'url' => asset('storage/' . $path),
            'mime_type' => $ext
        ]);

        return $file;
    }
    /**
     * Updates the old Image to the defined directory in a polymorphic way
     * @param UploadedFile $file
     * @param ?string $name
     * @param File|null $oldFile keep null if eager loaded or not inside a loop
     */
    public function updateFile(UploadedFile $file, ?string $name = null, File $oldFile = null): File
    {
        $oldFile = $oldFile ?? $this->image;
        $type = $this->fileableType ?? get_class($this);
        $id = $this->id;
        $ext = $file->getClientOriginalExtension();
        $name = $name ?? $file->getClientOriginalName();
        $name = str($name)->slug() . uniqid() . $ext;
        $path = $file->storeAs($this->baseDir . "/" . $this->dir, $name, $this->disk);
        $this->deleteFile($oldFile, true);
        $file = tap($oldFile)->update([
            'fileable_id' => $id,
            'fileable_type' => $type,
            'path' => $path,
            'url' => asset('storage/' . $path),
            'mime_type' => $ext
        ]);
        return $file;
    }

    /**
     * Deletes an Image to the defined directory in a polymorphic way
     * @param File $file keep null if eager loaded or not inside a loop
     * @param bool $fileOnly set true if you want the only file to be deleted
     */
    public function deleteFile(File $file = null, ?bool $fileOnly = false): bool
    {
        if (Storage::disk($this->disk)->exists($file->path)) {
            Storage::delete($file->path);
        }
        if ($fileOnly) {
            return true;
        }
        return $file->delete();
    }
}
