
@include('admin.includes.head')

<body>

 @include('admin.includes.header')
  
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Topic</h2>
      <form action="{{route('topics.update',$topic->id)}}" method="POST" class="px-md-5"  enctype="multipart/form-data" >
       @csrf
       @method('put')
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Design Patterns" name="topicTitle" class="form-control py-2" value="{{old('topicTitle', $topic['topicTitle'])}}"/>
            @error('topicTitle')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
          <div class="col-md-10">
            <select name="category_id" id="" class="form-control py-1" value="{{old('category_id', $topic['category_id'])}}">
            @foreach($categories as $category)
              <option value="{{$category->id}}" @if ($category->id == $topic->category_id)
                 {{'selected="selected"'}}
                 @endif > {{$category->category_name}}</option>
            @endforeach
            </select>
              @error('category')
                <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="" rows="5" class="form-control">{{old('content', $topic['content'])}}</textarea>
            @error('content')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
          <div class="col-md-10">
            <input type="hidden" name="trending" value="0">
            <input type="checkbox" class="form-check-input" name="trending" style="padding: 0.7rem;" value="1"@checked(old('trending', $topic->trending)) />
            @error('trending')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="hidden" name="published" value="0">
            <input type="checkbox" class="form-check-input" name="published" style="padding: 0.7rem;" value="1"@checked(old('published', $topic->published)) />
            @error('published')
             <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" name="image" style="padding: 0.7rem; margin-bottom: 10px;" value="{{old('image', $topic['image'])}}"/>
            <img src="assests/admin/images/topics/{{$topic->image}}" alt="{{$topic->topicTitle}}" style="width: 10rem;">
            @error('image')
             <div class="alert alert-warning">{{$message}}</div>
          @enderror
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Edit Topic
          </button>
        </div>
      </form>
    </div>
  </div>
  </main>
  <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/dataTables.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/tables.js')}}"></script>
</body>

</html>