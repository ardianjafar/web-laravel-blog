<!-- Main News Start-->
<div class="main-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($posts as $item)                        
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="{{ asset('bootstrap/img/news-350x223-1.jpg') }}" />
                            <div class="mn-title">
                                <a href=""></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mn-list">
                    <h2>Category</h2>
                    @foreach ($category as $item)
                    <ul>
                        <li><a href="">{{ $item->name }}</a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News End-->