<?php


namespace App\Repositories;


interface ImageRepositoryInterface extends RepositoryInterface
{
   public function getImageOfPost($houseId);

   public function deleteOfPost($houseId);
}
