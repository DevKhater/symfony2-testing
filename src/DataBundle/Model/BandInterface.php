<?php

namespace DataBundle\Model;

Interface BandInterface
{
    public function setName($name);
    public function getName();
    public function setGenre($name);    
    public function getGenre();
    public function setImage($image);
    public function getImage();
    public function setSlug($slug);
    public function getSlug();
}
