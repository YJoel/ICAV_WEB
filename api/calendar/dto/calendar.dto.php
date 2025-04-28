<?php

class CalendarDto
{
  public string $resourceId;
  public string $title;
  public string $start;
  public string $end;
  public string $backgroundColor;

  public function __construct(string $resourceId, string $title, string $start, string $end, string $backgroundColor)
  {
    $this->resourceId = $resourceId;
    $this->title = $title;
    $this->start = $start;
    $this->end = $end;
    $this->backgroundColor = $backgroundColor;
  }
}