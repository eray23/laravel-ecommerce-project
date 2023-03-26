
@extends("backend.shared.backend_theme")
@section("title", "Adres Modülü")
@section("subtitle", "Yeni Adres Ekle")
@section("add_new_url", url("/users/create"))
@section("content")

      <div class="table-responsive">
        <form action="{{url("/users/$user->user_id/addresses")}}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Şehir" placeholder="Şehir giriniz" field="city"/>
                </div>
                    <div class="col-lg-6">
                        <x-input label="İlçe" placeholder="İlçe giriniz" field="district"/>
                    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Posta Kodu" placeholder="Posta kodunu giriniz" field="zipcode"/>
                </div>
                <div class="col-lg-6">
                    <x-checkbox field="is_default" label="Varsayılan"  />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <x-textarea field="address" label="Açık Adres" placeholder="Açık Adres Giriniz"/>
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
