<?php

interface iRepositoryCartoes{

    public function getById(int $id);

    public function save(Cartoes $cartoes);

    public function getAll():array;

    public function delete(int $id);

    public function update(Cartoes $cartoes);

}