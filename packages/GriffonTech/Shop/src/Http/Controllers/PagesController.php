<?php


namespace GriffonTech\Shop\Http\Controllers;


class PagesController extends Controller
{

    protected $_config ;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function view($page)
    {
        return view($this->_config['view'], ['page' => $page]);
    }

}
