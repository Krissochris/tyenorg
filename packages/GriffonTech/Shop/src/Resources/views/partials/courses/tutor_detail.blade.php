@if (isset($tutor))
    <div style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-3">
                <div class="img-thumbnail">
                    <img src="{{ asset('lms/img/course-img/event-details.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-9">
                <table class="table ">
                    <thead class="">
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
                <a href="{{ (isset($tutor['facebook_url']) ? $tutor['facebook_url']: '' ) }}"><i class="fa fa-facebook-square fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                <a href="{{ (isset($tutor['twitter_url']) ? $tutor['twitter_url']: '' ) }}"><i class="fa fa-twitter fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                <a href="{{ (isset($tutor['twitter_url']) ? $tutor['twitter_url']: '' ) }}"><i class="fa fa-instagram fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                <a href="{{ (isset($tutor['twitter_url']) ? $tutor['twitter_url']: '' ) }}"><i class="fa fa-linkedin fa-lg text-dark grow"></i></a>&nbsp;&nbsp;&nbsp;

            </div>
        </div>
    </div>
@endif

