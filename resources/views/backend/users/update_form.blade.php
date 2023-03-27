

@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle", "Kullanıcı Bilgilerini Güncelle")
@section("add_new_url", url("/users/create"))
@section("content")


    <div class="table-responsive">
        <form action="{{url("/users/$user->user_id")}}" method="POST">
            @csrf
            @method("PUT")
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" field="name" value="{{$user->name}}"/>
                </div>
                <div class="col-lg-6">
                    <x-input label="Eposta" placeholder="Eposta Giriniz" field="email" type="email" value="{{$user->email}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <x-checkbox field="is_admin" label="Yetkili Kullanıcı" checked="{{$user->is_admin == 1}}"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <x-checkbox field="is_active" label="Aktif Kullanıcı" checked="{{$user->is_active == 1}}"/>
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

