<div class="row isotope-grid">
    @foreach ($infor_product as $item)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <a href="/cuahang/{{ $item->id }}/{{ Str::slug($item->nameproduct) }}.html"
                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        <img src="{{ $item->hinhanhproduct }}" alt="IMG-PRODUCT">
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/cuahang/{{ $item->id }}/{{ Str::slug($item->nameproduct) }}.html"
                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $item->nameproduct }}
                        </a>

                        <span class="stext-105 cl3">
                            {{ number_format($item->price) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center">
    {{ $infor_product->links() }}
</div>
