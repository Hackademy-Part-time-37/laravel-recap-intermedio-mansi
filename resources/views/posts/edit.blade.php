<x-app>
    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" value="{{ $post->title }}" name="title"
                            type="text">
                        <label for="name">Titolo</label>
                    </div>

                    <div class="form-control mb-3">
                        <div class="form-check">
                            <input class="form-check-input" @checked($post->is_active) type="checkbox" id="active_id"
                                name="is_active" value="true">
                            <label class="form-check-label" for="active_id">Pubblicato</label>
                        </div>
                    </div>
                    <div class="form-control mb-3">

                        <textarea class="form-control" name="body" value>{{ $post->body }}</textarea>


                    </div>
                    <div class="form-floating mb-3">
                        <img class="card-img-top" style="width:3rem" src="{{ Storage::url($post->image) }}"
                            alt="..." />
                        <input class="form-control" id="image" name="image" value type="file">

                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app>
