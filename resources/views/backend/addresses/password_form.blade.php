@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle", "Kullanıcı Şifre Güncelle")
@section("add_new_url", url("/users/create"))
@section("content")

    <div class="table-responsive">
        <form action="{{url("/users/$user->user_id/change-password")}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <label for="password" class="form-label">Şifre Giriniz</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi Giriniz">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="password_confirmation" class="form-label">Şifre Tekrarı</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifrenizi Tekrar Giriniz">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success mt-2">Kaydet</button>
                </div>
            </div>
        </form>
    </div>
@endsection

