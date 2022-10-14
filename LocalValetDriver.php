<?php

class LocalValetDriver extends LaravelValetDriver
{
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        if ($this->isActualFile($staticPath = $this->getStaticPath($sitePath))) {
            return $staticPath;
        }

        return parent::frontControllerPath($sitePath, $siteName, $uri);
    }

    protected function getStaticPath($sitePath)
    {
        $parts = parse_url($_SERVER['REQUEST_URI']);
        $query = $parts['query'] ?? '';

        return "{$sitePath}/public/static{$parts['path']}_{$query}.html";
    }
}
