<?php

interface iRepositoryPessoas {
    public function getById(int $id);
    public function save(Pessoas $pessoa);
    public function getAll(): array;
    public function delete(int $id);
    public function getByEmail(string $email);
    public function update(Pessoas $pessoa);
}
