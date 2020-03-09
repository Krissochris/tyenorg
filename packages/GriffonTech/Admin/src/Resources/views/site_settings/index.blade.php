@extends("admin::layouts.master")

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> Site Settings </h5>
        </div>

        <div class="ibox-content">

            {!! Form::open(['route' => ['admin.site_settings.update']]) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name"> Application Name  </label>
                        {!! Form::text('application_name', setting('application_name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="pro_membership_fee"> Pro Membership Fee </label>
                        {!! Form::number('pro_membership_fee', setting('pro_membership_fee'), ['class' => 'form-control']) !!}
                    </div>

                    <h5> Social Links</h5>

                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        {!! Form::text('facebook_url', setting('facebook_url'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="facebook_link">Twitter Link</label>
                        {!! Form::text('twitter_url',setting('twitter_url'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="facebook_link">Whatsapp Link</label>
                        {!! Form::text('whatsapp_url',setting('whatsapp_url'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="facebook_link">Telegram Link</label>
                        {!! Form::text('telegram_url',setting('telegram_url'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>
                </div>


            </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection
