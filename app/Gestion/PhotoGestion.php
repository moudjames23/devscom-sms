<?php

namespace App\Gestion;


use FontLib\Table\Type\name;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PhotoGestion
{

    public $nom;
    
    public function save($image)
    {

        if ($image->isValid())
        {
            $chemin = public_path('uploads/');
            $extension = $image->getClientOriginalExtension();

            $nomPhoto = str_random(10);

            // if ($extension  == 'png' || $extension  == 'PNG') {
            //     Image::make($image->getRealPath())->encode('jpg', 85);
            //     $this->extension  = 'jpg';
            // }

            $img = Image::make($image->getRealPath());
            $img->save($chemin . '' . $nomPhoto . '.' . $extension);

            $this->nom = $nomPhoto. '.' .$extension;

           return true;

        }

        return false;
    }

    public function saveCustom($image)
    {
        if ($image->isValid())
        {
            $chemin = public_path('uploads/');
            $extension = $image->getClientOriginalExtension();

            $nomPhoto = str_random(10);

            if ($extension  == 'png' || $extension  == 'PNG') {
                Image::make($image->getRealPath())->encode('jpg', 85);
                $this->extension  = 'jpg';
            }

            $img = Image::make($image->getRealPath());
            $img->resize('115', '115', function ($constraint) {
                $constraint->aspectRatio();
            })->save($chemin . '' . $nomPhoto . '.' . $this->extension);


            $this->nom = $nomPhoto. '.' .$extension;

            return true;

        }

        return false;
    }

    public function delete($name)
    {
        File::delete('uploads/' .$name);
    }

}