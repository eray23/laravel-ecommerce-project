
@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle", "Yeni Kullanıcı Ekle")
@section("add_new_url", url("/users/create"))
@section("content")


        <h2>Yeni Kullanıcı Ekle</h2>
      <div class="table-responsive">
        <form action="{{url("/users")}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                        <label for="name" class="form-label">Ad Soyad</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad Giriniz" value="{{old("name")}}">
                     @error("name")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label">Email Giriniz</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E posta Giriniz" value="{{old("email")}}">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="password" class="form-label">Şifre Giriniz</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi Giriniz">,
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
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
                        <label class="form-check-label" for="is_admin">Yetkili Kullanıcı</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
                        <label class="form-check-label" for="is_active">Aktif Kullanıcı</label>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-12">
                         <button type="submit" class="btn btn-success mt-2">Kaydet</button>
                    </div>
            </div>
        </form>
      </div>
    </main>
  </div>
</div>


    <script type="text/javascript" src="{{asset("build/assets/app-146f6bff.js")}}"></script>
  </body>
</html>
@endsection
