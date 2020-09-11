@php
    $brands = array();
@endphp
<div class="sub-cat-main row no-gutters">
    <div class="col-12">
        <div class="sub-cat-content">
            <div class="sub-cat-list">
                <div class="card-columns">
                    @foreach ($category->subcategories as $subcategory)
                        <div class="card">
                            <ul class="sub-cat-items">
                                <li class="sub-cat-name"><a href="{{ route('products.subcategory', $subcategory->slug) }}">{{ translate($subcategory->name) }}</a></li>
                                @foreach ($subcategory->subsubcategories as $subsubcategory)
                                    <li><a href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{ translate($subsubcategory->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
