<x-app>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>


        <button type="submit" class="btn btn-primary">Accedi</button>
    </form>
</x-app>
