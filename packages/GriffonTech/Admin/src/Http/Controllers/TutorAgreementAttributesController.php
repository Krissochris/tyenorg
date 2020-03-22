<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorAgreementAttributeRepository;
use Illuminate\Http\Request;

class TutorAgreementAttributesController extends Controller
{

    protected $_config;

    protected $tutorAgreementAttributeRepository;

    protected $_input_types = [
        'text' => 'Text',
        'textarea' => 'TextArea',
        'boolean' => 'Boolean',
        'select' => 'Select',
        /*'datetime' => 'DateTime',
        'date' => 'Date',
        'checkbox' => 'Checkbox'*/
    ];


    public function __construct(
        TutorAgreementAttributeRepository $tutorAgreementAttributeRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorAgreementAttributeRepository = $tutorAgreementAttributeRepository;
    }

    public function index()
    {
        $tutor_agreement_attributes = $this->tutorAgreementAttributeRepository
            ->get();
        return view($this->_config['view'])
            ->with(compact('tutor_agreement_attributes'));
    }

    public function create()
    {
        return view($this->_config['view'])
            ->with([
            'types' => $this->_input_types
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:tutor_agreement_attributes',
            'admin_name' => 'required',
            'type' => 'required',
            'position' => 'required|integer'
        ]);

        $tutor_agreement_attribute = $this->tutorAgreementAttributeRepository
            ->create($request->input());

        if ($tutor_agreement_attribute) {
            session()->flash('success', 'New Tutor Agreement Attribute was successfully added.');
        } else {
            session()->flash('error', 'New Tutor Agreement Attribute could not be added. Please try again');
        }
        return back();
    }

    public function edit($id)
    {
        $tutor_agreement_attribute = $this->tutorAgreementAttributeRepository->find($id);
        $types = $this->_input_types;
        return view($this->_config['view'])
            ->with(compact('tutor_agreement_attribute', 'types'));
    }

    public function update(Request $request, $id)
    {
        $postData = $request->input();
        unset($postData['code']);
        $tutor_agreement_attribute = $this->tutorAgreementAttributeRepository->update($postData, $id);

        if ($tutor_agreement_attribute) {
            session()->flash('success', 'Tutor Agreement Attribute was successfully updated.');
        } else {
            session()->flash('error', 'Tutor Agreement Attribute could not be updated. Please try again');
        }
        return back();
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->tutorAgreementAttributeRepository->delete($id);
            if ($deleted) {
                session()->flash('success', 'Tutor Agreement Attribute was successfully deleted.');
            } else {
                session()->flash('error', 'Tutor Agreement Attribute could not be deleted. Please try again later');
            }
        } catch (\Exception $exception) {
            session()->flash('error', sprintf('The following error occurred while processing your request : %s', $exception->getMessage()));
        }
        return redirect()->route($this->_config['redirect']);
    }
}
