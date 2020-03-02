<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\Testimony\Repositories\TestimonyRepository;
use Illuminate\Http\Request;

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
        $request->validate([
            'testimony' => 'required'
        ]);

        $postData = $request->all();
        $postData['user_id'] = auth('user')->user()->id;

        $testimony = $this->testimonyRepository->create($postData);
        if ($testimony) {
            session()->flash('success', 'Thank you for testifying for us.');
        } else {
            session()->flash('error', 'Your testimony was not registered. Please try again later.');
        }
        return redirect()->route($this->_config['redirect']);
    }

    public function destroy($id)
    {
        if ($this->testimonyRepository->delete($id)) {
            session()->flash('success', 'Testimony was successfully deleted!');
        } else {
            session()->flash('error', 'Testimony could not be deleted.Please try again later.');
        }
        return redirect()->route($this->_config['redirect']);
    }

}
