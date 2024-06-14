<?php

interface iRepositoryDespesas {
    public function getById(int $id);
    public function save(Despesas $despesa);
    public function getAll(): array;
    public function delete(int $id);
    public function update(Despesas $despesa);
}

