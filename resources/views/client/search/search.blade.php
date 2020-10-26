@extends('client.layouts.master')
@push('cssClient')
@endpush
@section('content')
    <div class="bg0 m-t-23 p-b-140" style="margin-top: 100px">
        <div class="container">
            @if($data != null)
                <h3 style="margin-bottom: 50px">kết quả tìm kiếm với "{{ request()->search }}"</h3>
            @endif
            <div class="row isotope-grid">
                @forelse($data as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ $item->img_path }}" alt="IMG-PRODUCT">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $item->name }}
                                </a>

                                <span class="stext-105 cl3">
									{{ '$ '. number_format($item->price) }}
								</span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="assets/client/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/client/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <span style="margin-left: 15px">Không có kết quả tìm kiếm</span>
                @endforelse
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <div class="">
                    <ul class="pagination">
                    {{ $data->appends([ "search" => request()->search ])->render() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
