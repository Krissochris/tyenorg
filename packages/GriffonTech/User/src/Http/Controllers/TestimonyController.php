<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\Testimony\Repositories\TestimonyRepository;
use http\Env\Request;

class TestimonyController extends Controller
{

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $testimonyRepository;


    public function __construct(
        TestimonyRepository $testimonyRepository
    )
    {
        $this->_config = request('_config');

        $this->testimonyRepository = $testimonyRepository;
    }


    public function index()
    {
        $testimonies = $this->testimonyRepository->findWhere([
            'user_id' => auth('user')->user()->id
        ]);

        return view($this->_config['view'], ['testimonies' => $testimonies]);
    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {

    }

}
