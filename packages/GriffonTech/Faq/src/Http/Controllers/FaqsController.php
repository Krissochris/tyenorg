<?php

namespace GriffonTech\Faq\Http\Controllers;

use GriffonTech\Faq\Repositories\FaqRepository;
use Illuminate\Http\Request;

class FaqsController extends Controller
{

    protected $_config;

    protected $faqRepository;


    public function __construct(
        FaqRepository $faqRepository
    )
    {

        $this->_config = request('_config');

        $this->faqRepository = $faqRepository;
    }


    public function index()
    {
        $faqs = $this->faqRepository->paginate(15);

        return view($this->_config['view'], compact('faqs'));
    }


    public function create()
    {
        $status = FaqRepository::STATUS;

        return view($this->_config['view'], compact('status'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq = $this->faqRepository->create($request->input());

        if ($faq) {
            session()->flash('success', 'Faq was successfully saved');
        } else {
            session()->flash('error', 'Faq could not be saved.Please try again');
        }
        return redirect()->route($this->_config['redirect']);
    }



    public function edit($id)
    {
        $faq = $this->faqRepository->findOrFail($id);

        $status = FaqRepository::STATUS;


        return view($this->_config['view'], compact('faq', 'status'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq = $this->faqRepository->update($request->input(), $id);

        if ($faq) {
            session()->flash('success', 'Faq was successfully updated');
        } else {
            session()->flash('error', 'Faq could not be updated.Please try again');
        }
        return redirect()->route($this->_config['redirect']);
    }


    public function destroy($id)
    {
        $faq = $this->faqRepository->delete($id);

        if ($faq) {
            session()->flash('success', 'Faq was successfully deleted');
        } else {
            session()->flash('error', 'Faq could not be deleted.Please try again');
        }
        return redirect()->route($this->_config['redirect']);
    }


}