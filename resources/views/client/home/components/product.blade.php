<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container ">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

        <div class="flex-w filter-tope-group flex-sb-m m-tb-10 p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả
                </button>
                @foreach($categories as $cat)
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="{{ '.'.$cat->id }}">
                    {{ $cat->name }}
                </button>
                @endforeach

            </div>

            <div class="flex-w filter-tope-group flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 filter-tope-group cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i> Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i> Search
                </div>
            </div>

            <!-- search -->
            @include('client.products.components.search')
            <!-- end search -->

            <!-- Filter -->
            @include('client.products.components.filter')
            <!-- end filter -->
        </div>

        <div class="row isotope-grid filter-tope-group">
            @foreach($products as $prd)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $prd->id_category }} {{ get_list_prd($prd->price) }}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <a href="{{ route('get.detail.product', $prd->slug ) }}"><img src="{{ $prd->img_path }}" alt="IMG-PRODUCT" style="height: available"></a>

                        <button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04  detailPrd"
                        data-id="{{ $prd->id }}" data-name="{{ $prd->name }}" data-price="{{ number_format($prd->price) }}" data-description="{{ $prd->description }}"
                        >
                            Quick View
                        </button>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{ route('get.detail.product', $prd->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $prd->name }}
                            </a>

                            <span class="stext-105 cl3">
									{{ number_format($prd->price) }}
								</span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
                                <a  data-url="{{ route('add.cart', $prd->id) }}" class="zmdi zmdi-shopping-cart add-to-cart"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
            <p class="stext-102 cl3 p-t-23 js-name-detail">

            </p>
        </div>
    </div>
</section>
<!-- end product  -->


