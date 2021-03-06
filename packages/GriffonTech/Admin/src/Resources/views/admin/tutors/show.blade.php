@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutors </h5>
                </div>
                <div class="ibox-content table-responsive">

                    <div class="row">
                        <div class="col-md-2">
                            @if($tutor->photo)
                                <img src="{{ $tutor->photo }}" class="card-img" alt="{{ $tutor->name }}">
                            @else
                                <img src="{{ asset('images/26238.png')}}" class="card-img" alt="{{ $tutor->name }}">
                            @endif
                            <div class="card-footer">
                                <a href="#">
                                    <button class="btn btn-dark text-center"><i class="fa fa-envelope-open-text"></i> Message</button>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Full Name:</td>
                                    <td> {{ $tutor->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td> {{ $tutor->title }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td> {{ $tutor->email }} </td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td> {{ $tutor->phone }} </td>
                                </tr>
                                <tr>
                                    <td> About Me :</td>
                                    <td> {{ $tutor->description }} </td>
                                </tr>

                                <tr>
                                    <td> Created On:</td>
                                    <td> {{ $tutor->created_at }}</td>
                                </tr>
                                <tr>
                                    <td> Wallet Balance </td>
                                    <td> ${{ number_format($tutor->amount_balance, 2) }}</td>
                                </tr>
                                <tr>
                                    <td> Total Earned Amount</td>
                                    <td> ${{ number_format($tutor->total_earned_amount, 2) }}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutor Courses </h5>
                </div>
                <div class="ibox-content table-responsive">
                    @if($tutor->courses)
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Price</td>
                                <td>Status</td>
                                <td>Registered On</td>
                                <td>Batches</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tutor->courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->type }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{{ $course->status }}</td>
                                    <td>{{ $course->created_at }}</td>
                                    <td>{{ $course->course_batches->count() }}</td>
                                    <td>
                                        <a href="{{ route('admin.courses.show', $course->id) }}">view</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutor Agreement </h5>
                </div>
                <div class="ibox-content table-responsive">
                    @if(isset($tutor_agreement))
                        <table class="table table-bordered">
                            @foreach($attributes as $attribute)
                                <tr>
                                    <th> {{ $attribute->admin_name }} </th>
                                    @if($attribute->type === 'boolean')

                                        <td> {{ ($tutor_agreement[$attribute->code]) ? 'Yes' : 'No' }} </td>

                                    @elseif($attribute->type === 'select')

                                        <td>
                                            @if($tutor_agreement[$attribute->code])
                                                {{ $attribute->options()->pluck('admin_name', 'id')->toArray()[$tutor_agreement[$attribute->code]] }}
                                            @else
                                                {{ 'Not option selected' }}
                                            @endif
                                        </td>

                                    @else
                                        <td> {{ $tutor_agreement[$attribute->code] }} </td>
                                    @endif
                                </tr>
                            @endforeach

                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
