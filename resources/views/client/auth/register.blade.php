@extends('client.layouts.master')
@section('content')
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Đăng ký
                        </h4>
                        <label for="name"><span style="color:black">Họ và tên</span</label>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Nhập tên">
                        </div>
                        <label for="email"><span style="color:black">Địa chỉ email</span></label>
                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Nhập email">
                        </div>

                        <label for="password"><span style="color:black">Nhập mật khẩu</span></label>
                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Nhập mật khẩu">
                        </div>

                        <label for="re_password"><span style="color:black">Nhập lại mật khẩu</span></label>
                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Nhập lại mật khẩu">
                        </div>

                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="Đăng ký">
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
