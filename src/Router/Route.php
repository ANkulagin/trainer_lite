<?php

namespace App\Router;

class Route
{
    // Конструктор класса Route принимает URI, метод HTTP и действие (action) для маршрута.
    public function __construct(
        private string $uri,
        private string $method,
        private $action
    ){}

    // Метод получения URI маршрута.
    public function getUri(): string
    {
        return $this->uri;
    }

    // Метод получения HTTP метода маршрута (GET, POST, etc.).
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Метод получения действия (action) связанного с маршрутом.
     * @return mixed
     */
    public function getAction():mixed
    {
        return $this->action;
    }

    // Статический метод для создания объекта Route для HTTP GET запроса.
    public static function get(string $uri, $action): static
    {
        return new static($uri, 'GET', $action);
    }

    // Статический метод для создания объекта Route для HTTP POST запроса.
    public static function post(string $uri, $action): static
    {
        return new static($uri, 'POST', $action);
    }
}
