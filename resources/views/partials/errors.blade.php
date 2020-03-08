@if (count($errors) > 0)
    <article class="message is-danger">
        <div class="message-body">
            @foreach ($errors->all() as $error)
                    <span class="text">{{ $error }}</span>
            @endforeach
        </div>
    </article>
@endif