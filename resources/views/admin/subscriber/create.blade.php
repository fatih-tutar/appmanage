<x-app-layout>
    <x-slot name="header">Abone Oluştur</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{route('subscribers.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Abone Adı</label>
                    <input type="text" name="ad" class="form-control" required value="{{old('ad')}}">
                </div>
                <div class="form-group">
                    <label for="">Telefon</label>
                    <input type="text" name="telefon" class="form-control" required value="{{old('telefon')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">Abone Oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
        </script>
    </x-slot>
</x-app-layout>