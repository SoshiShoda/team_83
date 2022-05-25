<div class="header-inner">
    <h1 class="site-title">
        <p>demosite</p>
    </h1>

    <button class="header_hamburger hamburger" id="js-hamburger"> <!--ハンバーガーメニュー-->
        <span class="ham_line ham_line1"></span>
        <span class="ham_line ham_line2"></span>
        <span class="ham_line ham_line3"></span>
    </button>

    <nav class="header_nav nav" id="js-nav">
        <ul class="nav_items nav-items">
        @if ( Session::has('id') )
            <li class="nav-items_item"><a href="{{ url('product_edit/'. Session::get('id') ) }}">会員編集</a></li>
            <li class="nav-items_item"><a href="{{ url('product_list') }}">商品一覧</a></li>
            <li class="nav-items_item"><a href="{{ url('buy') }}">カート</a></li>
        @else
            <li class="nav-items_item"><a href="{{ url('login') }}">ログイン</a></li>
            <li class="nav-items_item"><a href="{{ url('user_register') }}">会員登録</a></li>
            <li class="nav-items_item"><a href="{{ url('product_list') }}">商品一覧</a></li>
        @endif
        </ul>
    </nav>
</div>