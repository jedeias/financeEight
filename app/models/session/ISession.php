<?php

interface ISession{

public function set($var, $session);
public function get($var);
public function destroy();
public function validate();
}
