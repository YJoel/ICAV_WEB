<?php

require_once "./dto/calendar.dto.php";

class CalendarController
{
  private $calendarService = null;

  public function __construct()
  {
    require_once "./service/calendar.service.php";
    $this->calendarService = new CalendarService();
  }

  public function getAll()
  {
    return $this->calendarService->getAll();
  }

  public function getById(string $resourceId)
  {
    return $this->calendarService->getById($resourceId);
  }

  public function insert(CalendarDto $evento)
  {
    return $this->calendarService->insert($evento);
  }

  public function update(CalendarDto $evento, string $title)
  {
    return $this->calendarService->update($evento, $title);
  }

  public function remove(string $title)
  {
    return $this->calendarService->remove($title);
  }
}