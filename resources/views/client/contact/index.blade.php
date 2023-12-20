@extends('layouts.app')

@section('content')
<section class="contact spad" style="border-top: 1px solid gray;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Thông tin</span>
                        <h2>Liên Hệ</h2>
                        <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                            strict attention.</p>
                    </div>
                    <ul>
                        <li>
                            <h4>Nghệ An</h4>
                            <p>195 Lê Duẩn, Thành phố Vinh <br>+84 982-314-0958</p>
                        </li>
                        <li>
                            <h4>Thái Bình</h4>
                            <p>109 Lý Bôn, Thành phố Thái Bình  <br>+84 345-423-9893</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form method="post" action="{{ route('contact.store') }}" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Họ và tên">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="email" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Lời nhắn"></textarea>
                                <button type="submit" class="site-btn">Gửi </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
