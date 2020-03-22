<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorAgreementAttributeOptionRepository;
use GriffonTech\Tutor\Repositories\TutorAgreementAttributeRepository;
use Illuminate\Http\Request;

class TutorAgreementAttributeOptionsController extends Controller
{

    protected $_config;

    protected $tutorAgreementAttributeOptionRepository;

    protected $tutorAgreementAttributeRepository;

    public function __construct(
        TutorAgreementAttributeOptionRepository $tutorAgreementAttributeOptionRepository,
        TutorAgreementAttributeRepository $tutorAgreementAttributeRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorAgreementAttributeOptionRepository = $tutorAgreementAttributeOptionRepository;

        $this->tutorAgreementAttributeRepository = $tutorAgreementAttributeRepository;
    }

    public function index()
    {
        $tutor_agreement_attribute_options = $this->tutorAgreementAttributeOptionRepository
            ->with(['tutor_agreement_attribute:id,admin_name'])
            ->get();

        return view($this->_config['view'])->with(compact('tutor_agreement_attribute_options'));
    }

    public function create()
    {
        $tutor_agreement_attributes = $this->tutorAgreementAttributeRepository
            ->findWhereIn('type',[
                'select','radio'
            ])->pluck('admin_name', 'id');


        return view($this->_config['view'])->with(compact('tutor_agreement_attributes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tutor_agreement_attribute_id' => 'required',
            'admin_name' => 'required',
        ]);

        $tutor_agreement_attribute_option = $this->tutorAgreementAttributeOptionRepository
            ->create($request->input());

        if ($tutor_agreement_attribute_option) {
            session()->flash('success', 'Tutor Agreement Option was successfully saved');
        } else {
            session()->flash('error', 'Tutor Agreement Option could not be saved. Please try again later.');
        }
        return back();
    }


    public function edit($id)
    {
        $tutor_agreement_attribute_option = $this->tutorAgreementAttributeOptionRepository
            ->find($id);
        $tutor_agreement_attributes = $this->tutorAgreementAttributeRepository
            ->findWhereIn('type',[
                'select','radio'
            ])->pluck('admin_name', 'id');

        return view($this->_config['view'])
            ->with(compact('tutor_agreement_attribute_option', 'tutor_agreement_attributes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_name' => 'required'
        ]);

        $tutor_agreement_attribute_option = $this->tutorAgreementAttributeOptionRepository->update($request->input(), $id);
        if ($tutor_agreement_attribute_option) {
            session()->flash('success', 'Attribute Option was successfully updated');
        } else {
            session()->flash('error', 'Attribute Option could not be updated. Please try again later.');
        }

        return back();
    }

    public function destroy($id)
    {
        try {
            $deleted = $this->tutorAgreementAttributeOptionRepository->delete($id);

            if ($deleted) {
                session()->flash('success', 'Attribute Option was successfully deleted');
            } else {
                session()->flash('error', 'Attribute Option could not be deleted. Please try again later');
            }
        } catch (\Exception $exception) {
            session()->flash('error', sprintf('The following error occurred : %s', $exception->getMessage()));
        }
        return redirect()->route($this->_config['redirect']);
    }
}
