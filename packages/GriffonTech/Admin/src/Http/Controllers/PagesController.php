<?php


namespace GriffonTech\Admin\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    protected $_config;

    protected $pages = [
        'page_about_us' => 'About Us',
        'page_contact_us' => 'Contact Us',
        'page_terms_&_conditions' => 'Terms & Conditions',
        'page_disclaimer' => 'Disclaimer',
        'page_scuml_disclosure_&_agreement' => 'SCUML Disclosure & Agreement',
        'page_refund_policy' => 'Refund Policy',
        'page_privacy_policy' => 'Privacy Policy',
        'page_become_an_affiliate' => 'Become an Affiliate',
        'page_values_to_expect' => 'Values to Expect',
        'page_values_we_give' => 'Values We Give',
        'page_join_forum' => 'Join Forum',
        'page_join_tyen_club' => 'Join TYEN Club',
        'page_how_it_works' => 'How it works',
        'page_volunteer' => 'Volunteer',
        'page_donate' => 'Donate',
    ];

    public function __construct()
    {
        $this->_config = \request('_config');
    }

    public function index()
    {
        return view($this->_config['view'], ['pages' => $this->pages]);
    }

    public function edit($page)
    {
        if (!in_array( $page,array_keys($this->pages))) {
            abort(404);
        }
        return view($this->_config['view'], ['page' => $page]);
    }

    public function update(Request $request, $page)
    {
        if (!in_array( $page,array_keys($this->pages))) {
            abort(404);
        }
        $page_data = $request->input($page);
        if (!empty($page_data)) {
            setting([$page => $page_data]);
        }
        setting()->save();
        session()->flash('success', sprintf('%s has been updated!', $page));
        return back();
    }

    public function show($page)
    {
        if (!in_array( $page,array_keys($this->pages))) {
            abort(404);
        }
        return view($this->_config['view'], ['page' => $page, 'pages' => $this->pages]);
    }

}
