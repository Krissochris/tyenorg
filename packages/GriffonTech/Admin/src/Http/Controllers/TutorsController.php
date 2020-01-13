<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorProfileRepository;

class TutorsController extends Controller
{

    protected $_config;

    protected $tutorProfileRepository;

    public function __construct(
        TutorProfileRepository $tutorProfileRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorProfileRepository = $tutorProfileRepository;
    }

    public function index()
    {
        $tutors = $this->tutorProfileRepository->with(['user:id,name'])
            ->paginate(15,['id','title','user_id']);
        return view($this->_config['view'], compact('tutors'));
    }

    public function create()
    {
        return view($this->_config['view']);
    }

    public function show()
    {
        return view($this->_config['view']);
    }
    public function edit()
    {
        return view($this->_config['view']);
    }

    public function update()
    {
        return view($this->_config['view']);
    }

    public function store()
    {
        return view($this->_config['view']);
    }

    public function destroy()
    {
        return view($this->_config['view']);
    }
}
