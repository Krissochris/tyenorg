<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Contracts\TutorProfile;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use Illuminate\Http\Request;

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
            ->paginate(15,['id','title','user_id', 'created_at']);
        return view($this->_config['view'], compact('tutors'));
    }

    public function create()
    {
        return view($this->_config['view']);
    }


    public function show( $id)
    {
        $tutor = $this->tutorProfileRepository->with(['user:id,name'])
            ->findOneWhere(['id' => $id]);
        return view($this->_config['view'], compact('tutor'));
    }


    public function edit($id)
    {
        $tutor = $this->tutorProfileRepository->findOrFail($id);
        return view($this->_config['view'], compact('tutor'));
    }



    public function update(Request $request, $id)
    {
        $tutor = $this->tutorProfileRepository->findOrFail($id);

        $tutorUpdated = $tutor->update($request->input());

        if ($tutorUpdated) {
            session()->flash('success', 'Tutor profile was successfully updated!');
        } else {
            session()->flash('error', 'Tutor profile could not be updated!');
        }
        return redirect()->route($this->_config['redirect'], $tutor->id);
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
