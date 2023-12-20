<div class="col-lg-6 col-md-6">
    <nav class="header__menu mobile-menu">
        <ul>
            @foreach ($menus as $itemMenu)
                <li class=""><a href="{{ route($itemMenu->route) }}"> {{ $itemMenu->name }} </a></li>
            @endforeach
        </ul>
    </nav>
</div>
