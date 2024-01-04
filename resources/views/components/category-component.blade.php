<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
    <div class="card-body">
        <div class="shop__sidebar__categories">
            <ul class="nice-scroll">
                @foreach ($listCategory as $itemCategory )
                    <li>
                        <a href="{{ route('product.index', ['idcategory' => $itemCategory->id]) }}">
                            {{ $itemCategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
