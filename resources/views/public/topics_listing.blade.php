      @include('public.includes.head')
    
        @include('public.includes.navbarpages')

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Topics Listing</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Topics Listing</h2>
                        </div>

                    </div>
                </div>
            </header>


            <section class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Popular Topics</h3>
                        </div>
                        
                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            @foreach($topics as $topic)
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <img src="{{asset('assets/admin/images/topics/' . $topic['image']) }}" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-topics-listing-info d-flex">
                                        <div>
                                            <h5 class="mb-2">{{$topic['topicTitle']}}</h5>

                                            <p class="mb-0">{{$topic['content']}}</p>

                                            <a href="{{route('topicsDetail',$topic['id'])}}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                        </div>

                                    <span class="badge bg-design rounded-pill ms-auto">{{$topic['no_of_views']}}</span>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                           <div class="col-lg-12 col-12">
                           <nav aria-label="Page navigation example">
                           <ul class="pagination justify-content-center mb-0">
                             {{ $topics->links() }}     
                             </ul>
                             </nav>
                            </div>
                       {{--<div class="col-lg-12 col-12">
                        <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>--}}

                    </div>
                </div>
            </section>


            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">
                  
                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4">Trending Topics</h3>
                        </div>
                        @foreach($trendingTopics as $topic)
                        <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0">
                         
                            <div class="custom-block bg-white shadow-lg">
                            
                                <a href="{{route('topicsDetail',$topic['id'])}}">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">{{$topic['topicTitle']}}</h5>

                                            <p class="mb-0">{{$topic['content']}}</p>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">{{$topic['no_of_views']}}</span>
                                    </div>

                                    <img src="{{asset('assets/admin/images/topics/' . $topic['image']) }}" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
        @include('public.includes.footer')

    @include('public.includes.javascript')