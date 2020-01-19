<?php

namespace GriffonTech\Shop\Http\Controllers;

use GriffonTech\Faq\Repositories\FaqRepository;

class FaqController extends Controller
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

        $faqs = $this->faqRepository->all();

        return view($this->_config['view'], compact('faqs'));
    }
}