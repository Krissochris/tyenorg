@extends('shop::layouts.master')

@section('title')
    My Referrals
@stop

@section('content')

    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">My Referrals</h1>
        </div>
    </div>

    <div class="container page__container" style="margin-bottom: 60px;">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> is pro user </th>
                            <th> Registered On</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($referrals)
                            @foreach($referrals as $referral)
                                <tr>
                                    <td> {{ @$referral->referred_user->name }} </td>
                                    <td> {{ ($referral->referred_user->is_pro_user) ? 'Yes' : 'No' }} </td>
                                    <td> {{ $referral->created_at }} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- /.container -->
@endsection
