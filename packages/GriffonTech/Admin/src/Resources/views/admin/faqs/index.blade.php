@extends("admin::layouts.master")

@section('title')
    Admin | Faqs
@stop

@section("content")
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Frequently Asked Questions
                <div class=" float-right">
                    <a href="{{route('admin.faqs.create')}}" class="btn btn-dark"> Add Faq</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Published</th>
                            <th>Order</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td> {{ $faq->question }} </td>
                                <td> {{ $faq->answer }} </td>
                                <td> {!! ($faq->status) ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No</span>' !!} </td>
                                <td> {{ $faq->order }} </td>
                                <td> {{ $faq->created_at }} </td>
                                <td> {{ $faq->updated_at }} </td>
                                <td>
                                    <a href="{{route('admin.faqs.edit', $faq->id)}}"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;

                                    <a href="#"
                                       onclick="event.preventDefault();
                                               var response = confirm('Are you sure you want to delete this faq?');
                                               if (response) {
                                               document.getElementById('{{ $faq->id }}').submit(); }"
                                            ><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                                    <form id="{{ $faq['id'] }}" action="{{ route('admin.faqs.delete', $faq['id']) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $faqs->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
