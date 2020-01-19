@if (isset($tutor))
    <div class="col-md-10 bg-dark">
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('images/26238.png') }}" class="card-img" alt="">
                    <div class="card-footer">
                        <a href="#">
                            <button class="btn btn-dark float-right">Message</button>
                        </a>
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Tutor's profile</h4>
                    </div>
                    <div class="card-body">
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
                                <td> {{ $tutor['name'] }} </td>
                            </tr>
                            <tr>
                                <td> Title :</td>
                                <td> {{ (isset($tutor['title']) ? $tutor['title']: '' ) }} </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ (isset($tutor['email']) ? $tutor['email']: '' ) }}</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>{{ (isset($tutor['phone']) ? $tutor['phone']: '' ) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            Social links: &nbsp;&nbsp;&nbsp;
                            <a href="{{ (isset($tutor['facebook_url']) ? $tutor['facebook_url']: '' ) }}"><i class="fab fa-facebook-square fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                            <a href="{{ (isset($tutor['twitter_url']) ? $tutor['twitter_url']: '' ) }}"><i class="fab fa-twitter fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                            <a href="{{ (isset($tutor['twitter_url']) ? $tutor['twitter_url']: '' ) }}"><i class="fab fa-instagram fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                            <a href="{{ (isset($tutor['twitter_url']) ? $tutor['twitter_url']: '' ) }}"><i class="fab fa-linkedin fa-lg text-dark grow"></i></a>&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endif

