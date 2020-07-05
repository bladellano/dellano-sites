<?php


namespace Sts;

use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optmizer;

    public function __construct(string $schema="article")
    {
        $this->optmizer = new Optimizer();
        $this->optmizer->openGraph(
            getenv('SITE'),
            "pt_BR",
            $schema
        )->publisher(
            getenv('FB_PAGE'),
            getenv('FB_AUTHOR')
        )->facebook(
            getenv('APP_ID')
        );
    }

    public function render( string $title, string $description, string $url, string $image, bool $follow = true):string
    {
        $seo = $this->optmizer->optimize(
            $title,
            $description,
            $url,
            $image,
            $follow
        );
        return $seo->render();
    }
}