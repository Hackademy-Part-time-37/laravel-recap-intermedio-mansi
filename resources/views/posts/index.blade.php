<x-app>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="container mt-5">
            <div class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Articoli inseriti</h3>
                <form class="d-flex" role="search" action="#" method="POST">
                    <input class="form-control me-2" name="search" type="search" placeholder="Cerca Articolo"
                        aria-label="Search">
                </form>
                <a href="{{ route('posts.create') }}" class="btn btn btn-success me-md-2">
                    Crea Nuovo Articolo
                </a>
            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Titolo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">#1</th>
                            <td>
                                <img class="card-img-top" style="width:3rem" src="{{ Storage::url($post->image) }}"
                                    alt="..." />
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary me-md-2">
                                        Visualizza
                                    </a>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning me-md-2">
                                        Modifica
                                    </a>
                                    @if (Auth::user()->is_admin)
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger me-md-2">Elimina</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app>
