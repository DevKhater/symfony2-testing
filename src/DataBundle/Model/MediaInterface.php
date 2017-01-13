<?php

namespace DataBundle\Model;

Interface MediaInterface
{
    public function setImage($image);
    public function setImageUrl();
    public function getImage();
    public function getImageUrl();
}
