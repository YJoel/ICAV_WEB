<?php

require_once "./dto/user.dto.php";

class UserController
{
  private $userService = null;

  public function __construct()
  {
    require_once "./service/user.service.php";
    $this->userService = new UserService();
  }

  public function getOne(UserDto $user)
  {
    return $this->userService->getOne($user);
  }

  public function authorizedGetAll()
  {
    return $this->userService->authorizedGetAll();
  }

  public function getById($id)
  {
    return $this->userService->getById($id);
  }

  public function insert()
  {
    return $this->userService->insert();
  }

  public function update()
  {
    return $this->userService->update();
  }
}