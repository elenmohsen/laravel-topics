
@include('admin.includes.head')

<body>

@include('admin.includes.header')

  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Add Testimonial</h2>
      <form action="{{route('testimonials.store')}}" method="POST" class="px-md-5" enctype="multipart/form-data">
      @csrf
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Jhon Doe" name="name" class="form-control py-2"  value="{{old('name')}}" />
            @error('name')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
          <div class="col-md-10">
            <textarea name="content" id="" rows="5" class="form-control">{{old('content')}}</textarea>
            @error('content')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
          <div class="col-md-10">
            <input type="checkbox" class="form-check-input" name="published" style="padding: 0.7rem;" value="1" @checked(old('published')) />
            @error('published')
              <div class="alert alert-warning">{{$message}}</div>
            @enderror
          </div>
        </div>
        <hr>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
          <div class="col-md-10">
            <input type="file" class="form-control" name="image" style="padding: 0.7rem;" />
            @error('image')
          <div class="alert alert-warning">{{$message}}</div>
          @enderror
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Add Testimonial
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
