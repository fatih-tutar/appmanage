<x-app-layout>
    <x-slot name="header">Abone Bilgi Güncelleme</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('aboneler.update', $abone->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Abone Adı</label>
                    <input type="text" name="name" class="form-control" required value="{{$abone->name}}">
                </div>
                <div class="form-group">
                    <label for="">Telefon</label>
                    <input type="text" name="phone_number" class="form-control" required value="{{$abone->phone_number}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Abone Bilgileri Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
        </script>
    </x-slot>
</x-app-layout>