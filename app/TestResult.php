<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $x = null;
    protected $y = null;
    protected $color;
    protected $direction;

    public function setX($x)
    {
        $this->x = $x;
        return;
    }

    public function setY($y)
    {
        $this->y = $y;
        return;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getDirection()
    {
        return $this->direction;
    }

}
