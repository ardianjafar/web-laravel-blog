 <!-- Top News Start-->
 <div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    @foreach ($posts as $item)    
                    <div class="col-md-6 mb-4">
                        <div class="tn-img">
                            <img src="{{ asset('storage/' . $item->image ) }}" class="img-fluid w-100">
                            <div class="tn-title">
                                <a href="{{ route('blog.post', $item->slug) }}">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    @foreach ($posts as $item)  
                    <div class="col-md-6 p-2">
                        <div class="tn-img">
                            <img src="{{ asset('storage/' . $item->image ) }}" class="img-fluid w-100">
                            <div class="tn-title">
                                <a href="{{ route('blog.post', $item->slug) }}">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->