
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
                        <label for="city" class="form-label">Şehir</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Şehir Giriniz" value="{{old("city")}}">
                     @error("city")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                    <div class="col-lg-6">
                        <label for="district" class="form-label">İlçe</label>
                        <input type="text" class="form-control" id="district" name="district" placeholder="İlçe Giriniz" value="{{old("district")}}">
                        @error("district")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="zipcode" class="form-label">Posta Kodunuzu</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Posta Kodunu Giriniz">
                    @error("zipcode")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1">
                        <label class="form-check-label" for="is_default">Varsayılan</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="address" class="form-label">Açık Adres</label>
                    <textarea name="address" id="address" cols="20" rows="5" class="form-control"></textarea>
                    @error("address")
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
    </main>
  </div>
</div>


    <script type="text/javascript" src="{{asset("build/assets/app-146f6bff.js")}}"></script>
  </body>
</html>
@endsection
