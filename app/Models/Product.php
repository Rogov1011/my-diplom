<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'price', 'quantity', 'is_published', 'subcategory_id'];

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function uploadImage($file)
    {
        if ($file == null) return false;
        $filename = $file->getClientOriginalName();
        $path = 'products/products_' . $this->id . '/';
        $this->removeImage();
        $file->storeAs($path, $filename, 'uploads');
        $this->image = $path . $filename;
        $this->save();
    }

    public function getImage()
    {
        $image = $this->image;

        if ($image) {
            return asset(('uploads/' . $image));
        }
        return asset('assets/images/no_image.png');
    }

    public function removeImage()
    {
        if ($this->image) {
            Storage::disk('uploads')->delete($this->image);
            $this->image = null;
            $this->save();
        }
    }
    public function removeImg(){
        $this->removeImage();
        $this->delete();
    }
}
