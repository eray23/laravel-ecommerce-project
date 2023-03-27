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
                    <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" field="name"/>
                </div>
                    <div class="col-lg-6">
                        <x-input label="Email" placeholder="Email Giriniz" field="email" type="email"/>
                    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Şifre" placeholder="Şifrenizi Giriniz" field="password" type="password"/>
                </div>
                <div class="col-lg-6">
                    <x-input label="Şifre Tekrarı" placeholder="Şifrenizi Tekrar Giriniz" field="password_confirmation" type="password"/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <x-checkbox field="is_admin" label="Yetkili Kullanıcı" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <x-checkbox field="is_active" label="Aktif Kullanıcı" />
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
