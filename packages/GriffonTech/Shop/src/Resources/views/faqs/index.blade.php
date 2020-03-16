@extends("shop::layouts.master")


@section("content")
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Frequently Asked Questions
        </h1>


        <div class="row">
            <div class="col-md-8">
                <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($faqs as $faq)
                        <div class="card mb-4">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse-{{ $faq->id }}" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
            </div>
        </div>

    </div>


@endsection
