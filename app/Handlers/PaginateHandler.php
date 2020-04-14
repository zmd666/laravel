<?php
namespace App\Handlers;

class PaginateHandler
{
    private $query;
    private $perPage;
    private $page;

    public function __construct($query, $perPage, $page)
    {
        $this->query   = $query;
        $this->perPage = $perPage;
        $this->page    = $page;
    }

    public function meta()
    {
        $count = $this->query->get()->count();

        return [
            'meta' => [
                'total'        => $count,
                'count'        => $count,
                'per_page'     => $this->perPage,
                'current_page' => (int)$this->page,
                'total_page'  => ceil($count / $this->perPage),
            ]
        ];
    }

    public function list()
    {
        return $this->query
            ->skip(($this->page - 1) * $this->perPage)
            ->take($this->perPage)
            ->get();
    }
}