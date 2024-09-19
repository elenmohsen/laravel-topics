
@include('admin.includes.head')

<body>

@include('admin.includes.header')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Topics</h2>
                <a href="{{route('topics.create')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new topic</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                           <th scope="col">No. of views</th>
                            <th scope="col">Published</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topics as $topic)
                        <tr>
                            <th scope="row">{{\Carbon\Carbon::parse($topic->created_at)->format('d M Y')}}</th>
                            <td><a class="text-decoration-none text-dark" href="{{route('topics.show', $topic['id'])}}">{{$topic['topicTitle']}}</a> </td>
                            <td> {{$topic->category->category_name}}</td>
                            <td>{{ Str::limit($topic['content'], 20, $end = '...') }}</td>
                            <td>{{$topic->no_of_views}}
                             </td>
                            <td>@if($topic['published']==1) yes @else no @endif</td>
                            <td>@if($topic['trending']==1) yes @else no @endif</td>
                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{route('topics.edit',$topic['id'])}}"><img src="{{asset('assets/admin/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td><form action="{{route('topics.destroy',$topic['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link m-0 p-0"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></button>
                           </form>
                           </td>
                            {{--<td class="text-center"><a class="text-decoration-none text-dark" href="#"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></a></td>--}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/tables.js')}}"></script>
</body>
</html>