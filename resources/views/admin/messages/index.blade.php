@include('admin.includes.head')

<body>

@include('admin.includes.header')

    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                    @if(!$contact->active)
                        <tr>
                            <th scope="row">{{\Carbon\Carbon::parse($contact->created_at)->format('d M Y')}}</th>
                            <td><a href="{{route('messageDetail',$contact['id'])}}" class="text-decoration-none text-dark">{{ Str::limit($contact['message'],20, $end = '...') }}</a></td>
                            <td> {{$contact->name}}</td>
                            <td><form action="{{route('messages.destroy',$contact['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link m-0 p-0"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></button>
                           </form>
                           </td>
                        </tr>
                        @endif
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table2">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                    @if($contact->active)
                        <tr>
                            <th scope="row">{{\Carbon\Carbon::parse($contact->created_at)->format('d M Y')}}</th>
                            <td><a href="{{route('messageDetail',$contact['id'])}}" class="text-decoration-none text-dark">{{ Str::limit($contact['message'],20, $end = '...') }}</a></td>
                            <td>{{$contact->name}}</td>
                           <td><form action="{{route('messages.destroy',$contact['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link m-0 p-0"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></button>
                           </form>
                           </td>
                           {{--<td class="text-center"><a class="text-decoration-none text-dark" href="{{route('messages.destroy',$contact['id'])}}"><img src="{{asset('assets/admin/images/trash-can-svgrepo-com.svg')}}"></a></td>--}}
                        </tr>
                        @endif
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