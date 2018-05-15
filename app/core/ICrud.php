<?php
namespace App\Core;
interface ICRUD
{
    public function create();
    public function read(array $sql = []);
    public function update();
    public function delete();
    public function query(string $sql);
}