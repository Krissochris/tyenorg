<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Core\Helpers\FileManager;
use GriffonTech\Tutor\Contracts\TutorProfile;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class TutorsController extends Controller
{

    protected $_config;

    protected $tutorProfileRepository;

    protected $userRepository;

    public function __construct(
        TutorProfileRepository $tutorProfileRepository,
        UserRepository $userRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $tutors = $this->tutorProfileRepository
            ->getModel()
            ->paginate(15);

        return view($this->_config['view'], compact('tutors'));
    }


    public function create()
    {
        $users = $this->userRepository->pluck('name', 'id');
        $status = TutorProfileRepository::STATUS;
        return view($this->_config['view'])->with(compact('users', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1048'
        ]);

        $newData = $request->input();
        $user = $this->userRepository->find($request->input('user_id'),['id','name']);
        $newData['name'] = $user->name;
        if ($request->file('photo')) {
            $image = $request->file('photo');

            if ($newPhoto = (new FileManager())->upload($image, 'tutors')) {

                $newData['photo'] = $newPhoto;
            } else {
                session()->flash('error', 'Photo could not be uploaded.');
            }
        }

        $tutor = $this->tutorProfileRepository->create($newData);
        if ($tutor) {
            session()->flash('success', 'Tutor profile was successfully created');
        } else {
            session()->flash('error', 'Tutor profile could not be created.Please try again');
        }
        return redirect()->route($this->_config['redirect']);
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

        $tutorUpdated = $tutor->update($request->all());

        if ($tutorUpdated) {
            session()->flash('success', 'Tutor profile was successfully updated!');
        } else {
            session()->flash('error', 'Tutor profile could not be updated!');
        }
        return redirect()->route($this->_config['redirect'], $tutor->id);
    }


    public function destroy()
    {
        return view($this->_config['view']);
    }


    public function changeTutorProfileStatus(Request $request, $id)
    {
        if ( (int)$request->input('status') === 1) {
            $tutorActivated = $this->tutorProfileRepository->activateProfile($id);

            if ($tutorActivated) {
                session()->flash('success', 'Tutor profile account has been Activated');
            } else {
                session()->flash('error', 'Tutor profile account could not be Activated. Please try again.');
            }

        } elseif ( -1 === (int) $request->input('status')) {
            $tutorDeactivated = $this->tutorProfileRepository->deactivateProfile($id);
            if ($tutorDeactivated) {
                session()->flash('success', 'Tutor profile account has been deactivated');
            } else {
                session()->flash('error', 'Tutor profile account could not be deactivated. Please try again.');
            }
        }


        return redirect()->route($this->_config['redirect']);
    }
}
