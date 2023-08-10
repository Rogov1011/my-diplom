<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'images'];

    public function uploadImage($file)
    {
        if ($file == null) return false;
        $filename = $file->getClientOriginalName();
        $path = 'images/images_' . $this->id . '/';
        $this->removeImage();
        $file->storeAs($path, $filename, 'uploads');
        $this->images = $path . $filename;
        $this->save();
    }

    public function getImage()
    {
        $images = $this->images;

        if ($images) {
            return asset(('uploads/' . $images));
        }
        return asset('assets/images/no_image.png');
    }

    public function removeImage()
    {
        if ($this->images) {
            Storage::disk('uploads')->delete($this->images);
            $this->images = null;
            $this->save();
        }
    }
    public function removeImg()
    {
        $this->removeImage();
        $this->delete();
    }
}
