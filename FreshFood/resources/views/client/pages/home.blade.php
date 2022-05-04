@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')


<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($category as $cate)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('storage/' .$cate->products->last()->image)}}">
                        <h5><a href="#">{{$cate->nameCate}}</a></h5>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        @for( $i=0 ; $i < 5 ; $i++) @if($category[$i]->products->count()>3)
                            <li data-filter=".{{$category[$i]->slug}}">{{$category[$i]->nameCate}}</li>
                            @endif
                            @endfor
                            <!-- <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @for( $i=0 ; $i < 5 ; $i++)
             @if($category[$i]->products->count()>3)
                @for( $y= $category[$i]->products->count() - 2 ; $y > $category[$i]->products->count()-6 ; $y--)
              @if($category[$i]->products[$y]->status != 0)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$category[$i]->slug}} fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/' .$category[$i]->products[$y]->image)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li onclick="addCart({{$category[$i]->products[$y]->id}})"><a ><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{$category[$i]->products[$y]->slug}}">{{$category[$i]->products[$y]->namePro}}</a></h6>
                            <h5>{{ number_format($category[$i]->products[$y]->price, 0, ',', '.') . " VNĐ" }}</h5>
                        </div>
                    </div>
                </div>
                @endif
                @endfor
                @endif
                @endfor
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<!-- <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('client/img/banner/banner-1.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('client/img/banner/banner-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner End -->



<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Bài viết mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs->take(3) as $blog)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('storage/' .$blog->image)}}" style="height: 200px !important;" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{ date_format($blog->updated_at,"Y/m/d") }}</li>
                            <li><i class="fa fa-comment-o"></i> </li>
                        </ul>
                        <h5><a href="{{ $blog->slug_blog  }}">{{ $blog->name_blog }}</a></h5>
                        <p>{{ $blog->short_description }} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection

@section('javascript')

@endsection