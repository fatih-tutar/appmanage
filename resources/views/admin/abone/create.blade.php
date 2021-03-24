<x-app-layout>
    <x-slot name="header">Abone Ekle</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('aboneler.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">abone Adı</label>
                    <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="">Telefon</label>
                    <input type="text" name="phone_number" class="form-control" required value="{{old('phone_number')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Abone Ekle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
        </script>
    </x-slot>
</x-app-layout>