<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<details open>
<summary>
<h2 style="display:inline;border:none;">Table of Contents</h2>
</summary>

 - [Traits](#traits)
</details>

---

<details>
<summary>
<a href="#traits" style="display:inline;border:none;color:currentColor;font-size: 18px;font-weight:bold;">Traits</a>
</summary>

`HasImages`, use this trait when you have any need to store image in your model.
- **1: Use `HasImages` trait in your model**
```php
<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasImages;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

```
- **2: Now to store image use below example**
```php

$product = Product::create([
    ...
]);
$image = $product->storeImage($request->image);

```
- **3: To update image use below example**
```php

$image = $product->updateImage($request->image, $product->image);
$product->update([
    ...
]);

```

> Note: You can skip the second argument if not using inside a loop or you have eager loaded the image
- **4: To delete an image use below example**
```php

$image = $product->deleteImage($request->image, $product->image);

```
> Note: You can skip the first argument if not using inside a loop or you have eager loaded the image
- **5: To access image use below example**
```php

$product = Product::with('image')->first();
$imageUrl = $product->image->url
$imagePath = $product->image->path
$imageMimeType = $product->image->mime_type

//Or if you have multiple images

$product = Product::with('images')->first();
$images = $product->images

```
> Note: It's a best practice to load any relationship before you use them.


</details>
