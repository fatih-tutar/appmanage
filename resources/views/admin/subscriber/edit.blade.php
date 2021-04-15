<x-app-layout>
    <x-slot name="header">Kampanya Güncelleme</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('subscribers.update', $subscriber->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Abone Adı</label>
                    <input type="text" name="ad" class="form-control" required value="{{$subscriber->ad}}">
                </div>
                <div class="form-group">
                    <label for="">Telefon</label>
                    <input type="text" name="telefon" class="form-control" required value="{{$subscriber->telefon}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Abone Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
        </script>
    </x-slot>
</x-app-layout>