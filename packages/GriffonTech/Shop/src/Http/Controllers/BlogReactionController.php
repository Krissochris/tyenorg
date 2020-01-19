<?php


namespace GriffonTech\Shop\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogRepository;

class BlogReactionController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->_config = request('_config');

        $this->blogRepository = $blogRepository;
    }
}
