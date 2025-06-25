<?php
interface ORMinterface {
    public function Save();
    public function Delete();
    public function GetID();
    public function FindByID($id);
    public function FindAll();
}